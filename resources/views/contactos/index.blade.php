@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
  <div>
    <h1 class="text-3xl font-bold text-[#2E338C]">Contactos</h1>
    <p class="text-[#2E338C] text-sm">Listado de todos los contactos</p>
  </div>
  <a href="{{ route('contactos.create') }}" class="inline-flex items-center gap-2 px-6 py-2 rounded-lg bg-[#F2541B] text-white font-semibold shadow transition hover:bg-[#d9430f] focus:outline-none focus:ring-2 focus:ring-[#F2541B] focus:ring-offset-2">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    Nuevo Contacto
  </a>
</div>
<div class="overflow-x-auto rounded-xl shadow border border-[#2E338C]/10 bg-white">
  <table class="min-w-full divide-y divide-[#2E338C]/10">
    <thead class="bg-[#2E338C] text-white">
      <tr>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Cliente</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nombre</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Teléfono</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Cargo</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Acciones</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-[#2E338C]/10">
      @foreach($contactos as $contacto)
      <tr class="hover:bg-[#F2541B]/10 transition">
        <td class="px-4 py-2">{{ $contacto->id }}</td>
        <td class="px-4 py-2">{{ $contacto->cliente->nombre ?? '-' }}</td>
        <td class="px-4 py-2 font-semibold text-[#2E338C]">{{ $contacto->nombre }}</td>
        <td class="px-4 py-2">{{ $contacto->email }}</td>
        <td class="px-4 py-2">{{ $contacto->telefono }}</td>
        <td class="px-4 py-2">{{ $contacto->cargo }}</td>
        <td class="px-4 py-2 flex gap-2">
          <a href="{{ route('contactos.edit', $contacto) }}" class="px-3 py-1 rounded bg-[#2E338C] text-white text-xs font-medium hover:bg-[#23277a] transition">Editar</a>
          <form action="{{ route('contactos.destroy', $contacto) }}" method="POST" class="inline">
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
