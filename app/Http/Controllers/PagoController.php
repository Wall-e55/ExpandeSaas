<?php

namespace App\Http\Controllers;

use App\Models\Models\Pago;
use App\Models\Models\Cliente;
use App\Models\Models\Producto;
use App\Models\Models\Servicio;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $productos = Producto::orderBy('nombre')->get();
        $servicios = Servicio::orderBy('nombre')->get();
        return view('pagos.create', compact('clientes', 'productos', 'servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'status' => 'required|in:pendiente,pagado,fallido',
            // producto_id y servicio_id pueden ser null, pero al menos uno debe estar presente
        ]);
        if (!$request->producto_id && !$request->servicio_id) {
            return back()->withErrors(['producto_id' => 'Debes seleccionar un producto o un servicio.']);
        }
        Pago::create($request->all());
        return redirect()->route('pagos.index')->with('success', 'Pago registrado correctamente.');
    }

    public function edit(Pago $pago)
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $productos = Producto::orderBy('nombre')->get();
        $servicios = Servicio::orderBy('nombre')->get();
        return view('pagos.edit', compact('pago', 'clientes', 'productos', 'servicios'));
    }

    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
        ]);
        $pago->update($request->all());
        return redirect()->route('pagos.index')->with('success', 'Pago actualizado correctamente.');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente.');
    }
}
