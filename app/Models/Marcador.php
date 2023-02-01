<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcador extends Model
{
    use HasFactory;

    // muchos a uno
    public function Categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
