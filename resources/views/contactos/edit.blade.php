@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow p-8 mt-8">
    <h1 class="text-2xl font-bold text-[#2E338C] mb-6">Editar Contacto</h1>
    <form action="{{ route('contactos.update', $contacto) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="cliente_id" class="block text-sm font-medium text-[#2E338C] mb-1">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
                <option value="">Selecciona un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" @if($contacto->cliente_id == $cliente->id) selected @endif>{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="nombre" class="block text-sm font-medium text-[#2E338C] mb-1">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $contacto->nombre) }}" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-[#2E338C] mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $contacto->email) }}" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
        </div>
        <div>
            <label for="telefono" class="block text-sm font-medium text-[#2E338C] mb-1">Teléfono</label>
            <input type="text" name="telefono" value="{{ old('telefono', $contacto->telefono) }}" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2">
        </div>
        <div>
            <label for="cargo" class="block text-sm font-medium text-[#2E338C] mb-1">Cargo</label>
            <input type="text" name="cargo" value="{{ old('cargo', $contacto->cargo) }}" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2">
        </div>
        <div class="flex gap-3 mt-6">
            <button type="submit" class="px-6 py-2 rounded-lg bg-[#F2541B] text-white font-semibold shadow transition hover:bg-[#d9430f] focus:outline-none focus:ring-2 focus:ring-[#F2541B] focus:ring-offset-2">Actualizar</button>
            <a href="{{ route('contactos.index') }}" class="px-6 py-2 rounded-lg bg-[#2E338C] text-white font-semibold shadow transition hover:bg-[#23277a]">Cancelar</a>
        </div>
    </form>
</div>
@endsection
