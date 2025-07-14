<?php

namespace App\Http\Controllers;

use App\Models\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::all();
        return view('reportes.index', compact('reportes'));
    }

    public function create()
    {
        return view('reportes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);
        Reporte::create($request->all());
        return redirect()->route('reportes.index')->with('success', 'Reporte creado correctamente.');
    }

    public function edit(Reporte $reporte)
    {
        return view('reportes.edit', compact('reporte'));
    }

    public function update(Request $request, Reporte $reporte)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);
        $reporte->update($request->all());
        return redirect()->route('reportes.index')->with('success', 'Reporte actualizado correctamente.');
    }

    public function destroy(Reporte $reporte)
    {
        $reporte->delete();
        return redirect()->route('reportes.index')->with('success', 'Reporte eliminado correctamente.');
    }

    public function graficos()
    {
        // Aquí puedes pasar datos reales si lo deseas
        return view('reportes.graficos');
    }
}
