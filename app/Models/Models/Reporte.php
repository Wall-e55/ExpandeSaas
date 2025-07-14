<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'datos',
    ];
}
