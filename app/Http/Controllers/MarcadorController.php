<?php

namespace App\Http\Controllers;

use App\Models\Marcador;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MarcadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Marcadores/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marcador  $marcador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marcador $marcador)
    {
        //
    }
}
