<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Models\Cliente;

class Cita extends Model
{
    protected $fillable = [
        'cliente_id',
        'fecha_hora',
        'motivo',
        'estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
