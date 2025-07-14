<?php

namespace App\Http\Controllers;

use App\Models\Models\Ticket;
use App\Models\Models\Cliente;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('tickets.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'asunto' => 'required',
            'descripcion' => 'required',
            'cliente_id' => 'required|exists:clientes,id',
        ]);
        Ticket::create($request->all());
        return redirect()->route('tickets.index')->with('success', 'Ticket creado correctamente.');
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);
        $ticket->update($request->all());
        return redirect()->route('tickets.index')->with('success', 'Ticket actualizado correctamente.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket eliminado correctamente.');
    }
}
