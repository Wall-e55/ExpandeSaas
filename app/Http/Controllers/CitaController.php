<?php

namespace App\Http\Controllers;

use App\Models\Models\Cita;
use App\Models\Models\Cliente;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with('cliente')->get();
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('citas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_hora' => 'required|date',
            'motivo' => 'required',
        ]);
        Cita::create($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente.');
    }

    public function edit(Cita $cita)
    {
        $clientes = Cliente::all();
        return view('citas.edit', compact('cita', 'clientes'));
    }

    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_hora' => 'required|date',
            'motivo' => 'required',
        ]);
        $cita->update($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }
}
