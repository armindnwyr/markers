<?php

namespace App\Http\Controllers;

use App\Http\Resources\MarcadorResource;
use App\Models\Categoria;
use App\Models\Marcador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class MarcadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcador = MarcadorResource::collection(Marcador::with('categoria')->get());
        return Inertia::render('Marcadores/Index', compact('marcador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return Inertia::render('Marcadores/Create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'enlace' => 'required',
            'image' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);

        $marcador = new Marcador();

        if ($request->hasFile('image')) {
            $img = $request->file('image')->store('public/imagen');
            $url = Storage::url($img);
            $marcador->image = $url;
        }

        $marcador->titulo = $request->titulo;
        $marcador->enlace = $request->enlace;
        $marcador->descripcion = $request->descripcion;
        $marcador->categoria_id = $request->categoria;

        $marcador->save();

        return Redirect::route('marcador.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marcador  $marcador
     * @return \Illuminate\Http\Response
     */
    public function show(Marcador $marcador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marcador  $marcador
     * @return \Illuminate\Http\Response
     */
    public function edit(Marcador $marcador)
    {
        $categorias = Categoria::all();

        return Inertia::render('Marcadores/Edit', compact('marcador', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marcador  $marcador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marcador $marcador)
    {
        $request->validate([
            'titulo' => 'required',
            'enlace' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);



        if ($request->hasFile('image')) {
            $dimage = str_replace('storage', 'public', $marcador->image);
            Storage::delete($dimage);

            $img = $request->file('image')->store('public/imagen');
            $url = Storage::url($img);

            $marcador->image = $url;
        }

        $marcador->titulo = $request->titulo;
        $marcador->enlace = $request->enlace;
        $marcador->descripcion = $request->descripcion;
        $marcador->categoria_id = $request->categoria;

        $marcador->save();
        return Redirect::route('marcador.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marcador  $marcador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marcador $marcador)
    {
        $img = str_replace('storage', 'public', $marcador->image);
        Storage::delete($img);

        $marcador->delete();

        return Redirect::route('marcador.index');
    }
}
