@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow p-8 mt-8">
    <h1 class="text-2xl font-bold text-[#2E338C] mb-6">Editar Cita</h1>
    <form action="{{ route('citas.update', $cita) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="cliente_id" class="block text-sm font-medium text-[#2E338C] mb-1">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
                <option value="">Selecciona un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" @if($cita->cliente_id == $cliente->id) selected @endif>{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="fecha_hora" class="block text-sm font-medium text-[#2E338C] mb-1">Fecha y Hora</label>
            <input type="datetime-local" name="fecha_hora" id="fecha_hora" value="{{ old('fecha_hora', \Carbon\Carbon::parse($cita->fecha_hora)->format('Y-m-d\TH:i')) }}" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
        </div>
        <div>
            <label for="motivo" class="block text-sm font-medium text-[#2E338C] mb-1">Motivo</label>
            <input type="text" name="motivo" id="motivo" value="{{ old('motivo', $cita->motivo) }}" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
        </div>
        <div>
            <label for="estado" class="block text-sm font-medium text-[#2E338C] mb-1">Estado</label>
            <input type="text" name="estado" id="estado" value="{{ old('estado', $cita->estado) }}" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2">
        </div>
        <div class="flex gap-3 mt-6">
            <button type="submit" class="px-6 py-2 rounded-lg bg-[#F2541B] text-white font-semibold shadow transition hover:bg-[#d9430f] focus:outline-none focus:ring-2 focus:ring-[#F2541B] focus:ring-offset-2">Actualizar</button>
            <a href="{{ route('citas.index') }}" class="px-6 py-2 rounded-lg bg-[#2E338C] text-white font-semibold shadow transition hover:bg-[#23277a]">Cancelar</a>
        </div>
    </form>
</div>
@endsection
