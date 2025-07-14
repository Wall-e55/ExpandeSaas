<?php

namespace App\Http\Controllers;

use App\Models\Models\Contacto;
use App\Models\Models\Cliente;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contacto::with('cliente')->get();
        return view('contactos.index', compact('contactos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('contactos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'nombre' => 'required',
            'email' => 'required|email',
        ]);
        Contacto::create($request->all());
        return redirect()->route('contactos.index')->with('success', 'Contacto creado correctamente.');
    }

    public function edit(Contacto $contacto)
    {
        $clientes = Cliente::all();
        return view('contactos.edit', compact('contacto', 'clientes'));
    }

    public function update(Request $request, Contacto $contacto)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'nombre' => 'required',
            'email' => 'required|email',
        ]);
        $contacto->update($request->all());
        return redirect()->route('contactos.index')->with('success', 'Contacto actualizado correctamente.');
    }

    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        return redirect()->route('contactos.index')->with('success', 'Contacto eliminado correctamente.');
    }
}
