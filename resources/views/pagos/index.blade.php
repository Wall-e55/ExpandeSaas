@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
  <div>
    <h1 class="text-3xl font-bold text-[#2E338C]">Pagos</h1>
    <p class="text-[#2E338C] text-sm">Listado de todos los pagos registrados</p>
  </div>
  <a href="{{ route('pagos.create') }}" class="inline-flex items-center gap-2 px-6 py-2 rounded-lg bg-[#F2541B] text-white font-semibold shadow transition hover:bg-[#d9430f] focus:outline-none focus:ring-2 focus:ring-[#F2541B] focus:ring-offset-2">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    Nuevo Pago
  </a>
</div>
<div class="overflow-x-auto rounded-xl shadow border border-[#2E338C]/10 bg-white">
  <table class="min-w-full divide-y divide-[#2E338C]/10">
    <thead class="bg-[#2E338C] text-white">
      <tr>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Monto</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Fecha</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Estado</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Producto</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Servicio</th>
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Acciones</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-[#2E338C]/10">
      @foreach($pagos as $pago)
      <tr class="hover:bg-[#F2541B]/10 transition">
        <td class="px-4 py-2">{{ $pago->id }}</td>
        <td class="px-4 py-2 font-semibold text-[#2E338C]">${{ number_format($pago->monto, 2) }}</td>
        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($pago->fecha)->format('d/m/Y') }}</td>
        <td class="px-4 py-2">
          @if($pago->status === 'pagado')
            <span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Pagado</span>
          @elseif($pago->status === 'pendiente')
            <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800 text-xs font-semibold">Pendiente</span>
          @elseif($pago->status === 'fallido')
            <span class="px-2 py-1 rounded bg-red-100 text-red-800 text-xs font-semibold">Fallido</span>
          @else
            <span class="px-2 py-1 rounded bg-gray-100 text-gray-800 text-xs font-semibold">{{ ucfirst($pago->status) }}</span>
          @endif
        </td>
        <td class="px-4 py-2">
          {{ $pago->producto->nombre ?? '-' }}
        </td>
        <td class="px-4 py-2">
          {{ $pago->servicio->nombre ?? '-' }}
        </td>
        <td class="px-4 py-2 flex gap-2">
          <a href="{{ route('pagos.edit', $pago) }}" class="px-3 py-1 rounded bg-[#2E338C] text-white text-xs font-medium hover:bg-[#23277a] transition">Editar</a>
          <form action="{{ route('pagos.destroy', $pago) }}" method="POST" class="inline">
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
