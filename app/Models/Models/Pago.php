<?php

namespace App\Models\Models;

use App\Models\Models\Cliente;
use App\Models\Models\Producto;
use App\Models\Models\Servicio;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
        'cliente_id',
        'producto_id',
        'servicio_id',
        'tipo',
        'status',
        'monto',
        'moneda',
        'external_id',
        'detalles',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
