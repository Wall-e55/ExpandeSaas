@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow p-8 mt-8">
    <h1 class="text-2xl font-bold text-[#2E338C] mb-6">Editar Servicio</h1>
    <form action="{{ route('servicios.update', $servicio) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre" class="block text-sm font-medium text-[#2E338C] mb-1">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $servicio->nombre) }}" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
        </div>
        <div>
            <label for="precio" class="block text-sm font-medium text-[#2E338C] mb-1">Precio</label>
            <input type="number" step="0.01" name="precio" value="{{ old('precio', $servicio->precio) }}" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
        </div>
        <div class="flex gap-3 mt-6">
            <button type="submit" class="px-6 py-2 rounded-lg bg-[#F2541B] text-white font-semibold shadow transition hover:bg-[#d9430f] focus:outline-none focus:ring-2 focus:ring-[#F2541B] focus:ring-offset-2">Actualizar</button>
            <a href="{{ route('servicios.index') }}" class="px-6 py-2 rounded-lg bg-[#2E338C] text-white font-semibold shadow transition hover:bg-[#23277a]">Cancelar</a>
        </div>
    </form>
</div>
@endsection
