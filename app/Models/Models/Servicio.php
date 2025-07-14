<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'activo',
    ];

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'servicio_id');
    }
}
