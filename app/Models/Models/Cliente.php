<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'empresa',
        'direccion',
    ];

    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'cliente_id');
    }
}
