@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow p-8 mt-8">
    <h1 class="text-2xl font-bold text-[#2E338C] mb-6">Nuevo Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label for="nombre" class="block text-sm font-medium text-[#2E338C] mb-1">Nombre</label>
            <input type="text" name="nombre" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-[#2E338C] mb-1">Email</label>
            <input type="email" name="email" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
        </div>
        <div>
            <label for="telefono" class="block text-sm font-medium text-[#2E338C] mb-1">Teléfono</label>
            <input type="text" name="telefono" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2">
        </div>
        <div>
            <label for="empresa" class="block text-sm font-medium text-[#2E338C] mb-1">Empresa</label>
            <input type="text" name="empresa" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2">
        </div>
        <div>
            <label for="direccion" class="block text-sm font-medium text-[#2E338C] mb-1">Dirección</label>
            <input type="text" name="direccion" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2">
        </div>
        <div class="flex gap-3 mt-6">
            <button type="submit" class="px-6 py-2 rounded-lg bg-[#F2541B] text-white font-semibold shadow transition hover:bg-[#d9430f] focus:outline-none focus:ring-2 focus:ring-[#F2541B] focus:ring-offset-2">Guardar</button>
            <a href="{{ route('clientes.index') }}" class="px-6 py-2 rounded-lg bg-[#2E338C] text-white font-semibold shadow transition hover:bg-[#23277a]">Cancelar</a>
        </div>
    </form>
</div>
@endsection

{{--
- Inputs y botones con colores corporativos.
- Bordes y focus en azul, botón principal naranja.
- Layout centrado y responsivo.
--}}
