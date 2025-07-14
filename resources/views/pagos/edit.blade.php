@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow p-8 mt-8">
    <h1 class="text-2xl font-bold text-[#2E338C] mb-6">Editar Pago</h1>
    <form action="{{ route('pagos.update', $pago) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="monto" class="block text-sm font-medium text-[#2E338C] mb-1">Monto</label>
            <input type="number" step="0.01" name="monto" value="{{ old('monto', $pago->monto) }}" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
        </div>
        <div>
            <label for="fecha" class="block text-sm font-medium text-[#2E338C] mb-1">Fecha</label>
            <input type="date" name="fecha" value="{{ old('fecha', $pago->fecha) }}" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
        </div>
        <div>
            <label for="cliente_id" class="block text-sm font-medium text-[#2E338C] mb-1">Cliente</label>
            <select name="cliente_id" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
                <option value="">Selecciona un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" @if(old('cliente_id', $pago->cliente_id) == $cliente->id) selected @endif>{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="producto_id" class="block text-sm font-medium text-[#2E338C] mb-1">Producto</label>
            <select name="producto_id" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2">
                <option value="">Selecciona un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}" @if(old('producto_id', $pago->producto_id) == $producto->id) selected @endif>{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="servicio_id" class="block text-sm font-medium text-[#2E338C] mb-1">Servicio</label>
            <select name="servicio_id" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2">
                <option value="">Selecciona un servicio</option>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" @if(old('servicio_id', $pago->servicio_id) == $servicio->id) selected @endif>{{ $servicio->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="status" class="block text-sm font-medium text-[#2E338C] mb-1">Estado</label>
            <select name="status" class="w-full rounded-lg border border-[#2E338C]/20 focus:border-[#2E338C] focus:ring-2 focus:ring-[#2E338C]/30 px-4 py-2" required>
                <option value="">Selecciona un estado</option>
                <option value="pendiente" @if(old('status', $pago->status) == 'pendiente') selected @endif>Pendiente</option>
                <option value="pagado" @if(old('status', $pago->status) == 'pagado') selected @endif>Pagado</option>
                <option value="fallido" @if(old('status', $pago->status) == 'fallido') selected @endif>Fallido</option>
            </select>
        </div>
        <div class="flex gap-3 mt-6">
            <button type="submit" class="px-6 py-2 rounded-lg bg-[#F2541B] text-white font-semibold shadow transition hover:bg-[#d9430f] focus:outline-none focus:ring-2 focus:ring-[#F2541B] focus:ring-offset-2">Actualizar</button>
            <a href="{{ route('pagos.index') }}" class="px-6 py-2 rounded-lg bg-[#2E338C] text-white font-semibold shadow transition hover:bg-[#23277a]">Cancelar</a>
        </div>
    </form>
</div>
@endsection
