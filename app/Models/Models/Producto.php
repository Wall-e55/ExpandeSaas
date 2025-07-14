<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'activo',
    ];

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'producto_id');
    }
}
