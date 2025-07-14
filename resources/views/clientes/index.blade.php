@extends('layouts.app')

@section('content')
<!-- Header de la página de Clientes -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
  <div>
    <h1 class="text-3xl font-bold text-[#2E338C]">Clientes</h1>
    <p class="text-[#2E338C] text-sm">Listado de todos los clientes registrados</p>
  </div>
  <!-- Botón Nuevo Cliente -->
  <a href="{{ route('clientes.create') }}" class="inline-flex items-center gap-2 px-6 py-2 rounded-lg bg-[#F2541B] text-white font-semibold shadow transition hover:bg-[#d9430f] focus:outline-none focus:ring-2 focus:ring-[#F2541B] focus:ring-offset-2">
    <!-- Icono + -->
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    Nuevo Cliente
  </a>
</div>

<!-- Listado de Clientes (tabla responsive) -->
<div class="overflow-x-auto rounded-xl shadow border border-[#2E338C]/10 bg-white">
  <table class="min-w-full divide-y divide-[#2E338C]/10">
    <thead class="bg-[#2E338C] text-white">
      <tr>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nombre</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Teléfono</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Empresa</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Dirección</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Acciones</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-[#2E338C]/10">
      @foreach($clientes as $cliente)
      <tr class="hover:bg-[#F2541B]/10 transition">
        <td class="px-4 py-2">{{ $cliente->id }}</td>
        <td class="px-4 py-2 font-semibold text-[#2E338C]">{{ $cliente->nombre }}</td>
        <td class="px-4 py-2">{{ $cliente->email }}</td>
        <td class="px-4 py-2">{{ $cliente->telefono }}</td>
        <td class="px-4 py-2">{{ $cliente->empresa }}</td>
        <td class="px-4 py-2">{{ $cliente->direccion }}</td>
        <td class="px-4 py-2 flex gap-2">
          <a href="{{ route('clientes.edit', $cliente) }}" class="px-3 py-1 rounded bg-[#2E338C] text-white text-xs font-medium hover:bg-[#23277a] transition">Editar</a>
          <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-1 rounded bg-[#F2541B] text-white text-xs font-medium hover:bg-[#d9430f] transition">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

{{--
- Colores corporativos: azul para encabezado, naranja para acciones.
- Tabla responsiva y moderna.
- Hover y transiciones para mejor UX.
--}}
