@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto bg-white rounded-xl shadow p-8 mt-8">
    <h1 class="text-2xl font-bold text-[#2E338C] mb-6">Dashboard Ejecutivo</h1>
    {{-- Bloque de depuración temporal para ver los datos que llegan del backend en la consola --}}
    @if(app()->environment('local'))
    <script>
        console.log('Ventas por mes:', @json($ventasPorMes));
        console.log('Productos más vendidos:', @json($productosMasVendidos));
        console.log('Tickets por estado:', @json($ticketsPorEstado));
        console.log('Citas por mes:', @json($citasPorMes));
        console.log('Productos más pagados:', @json($productosMasPagados));
        console.log('Servicios más pagados:', @json($serviciosMasPagados));
    </script>
    @endif
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-[#2E338C]/10 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-[#2E338C]">{{ $totalUsuarios }}</div>
            <div class="text-[#2E338C]">Usuarios</div>
        </div>
        <div class="bg-[#F2541B]/10 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-[#F2541B]">{{ $totalClientes }}</div>
            <div class="text-[#F2541B]">Clientes</div>
        </div>
        <div class="bg-[#4BC0C0]/10 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-[#4BC0C0]">{{ $totalProductos }}</div>
            <div class="text-[#4BC0C0]">Productos</div>
        </div>
        <div class="bg-[#FFCE56]/10 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-[#FFCE56]">{{ $totalServicios }}</div>
            <div class="text-[#FFCE56]">Servicios</div>
        </div>
        <div class="bg-[#36A2EB]/10 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-[#36A2EB]">{{ $totalPagos }}</div>
            <div class="text-[#36A2EB]">Pagos</div>
        </div>
        <div class="bg-[#23277a]/10 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-[#23277a]">{{ $totalTickets }}</div>
            <div class="text-[#23277a]">Tickets</div>
        </div>
        <div class="bg-[#F2541B]/20 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-[#F2541B]">{{ $totalCitas }}</div>
            <div class="text-[#F2541B]">Citas</div>
        </div>
        <!-- Widget de Reportes eliminado -->
        <div class="bg-[#4BC0C0]/20 rounded-lg p-4 text-center">
            <div class="text-3xl font-bold text-[#4BC0C0]">{{ $totalContactos }}</div>
            <div class="text-[#4BC0C0]">Contactos</div>
        </div>
    </div>
    <!-- INICIO NUEVA GRILLA DE GRÁFICOS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mb-10">
        <div>
            <h2 class="text-lg font-semibold mb-2">Ventas por Mes</h2>
            @if(count($ventasPorMes))
                <canvas id="barChart"></canvas>
            @else
                <div class="text-gray-500">No hay datos para mostrar.</div>
            @endif
        </div>
        <div>
            <h2 class="text-lg font-semibold mb-2">Productos Más Vendidos</h2>
            @if(count($productosMasVendidos))
                <canvas id="pieChart"></canvas>
            @else
                <div class="text-gray-500">No hay datos para mostrar.</div>
            @endif
        </div>
        <div>
            <h2 class="text-lg font-semibold mb-2">Tickets por Estado</h2>
            @if(count($ticketsPorEstado))
                <canvas id="ticketsEstadoChart"></canvas>
            @else
                <div class="text-gray-500">No hay datos para mostrar.</div>
            @endif
        </div>
        <div>
            <h2 class="text-lg font-semibold mb-2">Citas por Mes</h2>
            @if(count($citasPorMes))
                <canvas id="citasMesChart"></canvas>
            @else
                <div class="text-gray-500">No hay datos para mostrar.</div>
            @endif
        </div>
        <div>
            <h2 class="text-lg font-semibold mb-2">Productos Más Pagados</h2>
            @if(count($productosMasPagados))
                <canvas id="productosPagadosChart"></canvas>
            @else
                <div class="text-gray-500">No hay datos para mostrar.</div>
            @endif
        </div>
        <div>
            <h2 class="text-lg font-semibold mb-2">Servicios Más Pagados</h2>
            @if(count($serviciosMasPagados))
                <canvas id="serviciosPagadosChart"></canvas>
            @else
                <div class="text-gray-500">No hay datos para mostrar.</div>
            @endif
        </div>
    </div>
    <!-- FIN NUEVA GRILLA DE GRÁFICOS -->
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Ventas por Mes
    const ventasPorMes = @json($ventasPorMes->toArray());
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(ventasPorMes).map(m => 'Mes ' + m),
            datasets: [{
                label: 'Ventas',
                data: Object.values(ventasPorMes),
                backgroundColor: '#2E338C',
            }]
        }
    });
    // Productos Más Vendidos
    const productosMasVendidos = @json($productosMasVendidos->toArray());
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: Object.keys(productosMasVendidos),
            datasets: [{
                data: Object.values(productosMasVendidos),
                backgroundColor: ['#2E338C', '#F2541B', '#4BC0C0', '#FFCE56', '#36A2EB'],
            }]
        }
    });
    // Tickets por Estado
    const ticketsPorEstado = @json($ticketsPorEstado->toArray());
    new Chart(document.getElementById('ticketsEstadoChart'), {
        type: 'doughnut',
        data: {
            labels: Object.keys(ticketsPorEstado),
            datasets: [{
                data: Object.values(ticketsPorEstado),
                backgroundColor: ['#2E338C', '#F2541B', '#4BC0C0', '#FFCE56', '#36A2EB'],
            }]
        }
    });
    // Citas por Mes
    const citasPorMes = @json($citasPorMes->toArray());
    new Chart(document.getElementById('citasMesChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(citasPorMes).map(m => 'Mes ' + m),
            datasets: [{
                label: 'Citas',
                data: Object.values(citasPorMes),
                backgroundColor: '#F2541B',
            }]
        }
    });
    // Productos Más Pagados
    const productosMasPagados = @json($productosMasPagados->toArray());
    new Chart(document.getElementById('productosPagadosChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(productosMasPagados),
            datasets: [{
                label: 'Pagos',
                data: Object.values(productosMasPagados),
                backgroundColor: '#2E338C',
            }]
        }
    });
    // Servicios Más Pagados
    const serviciosMasPagados = @json($serviciosMasPagados->toArray());
    new Chart(document.getElementById('serviciosPagadosChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(serviciosMasPagados),
            datasets: [{
                label: 'Pagos',
                data: Object.values(serviciosMasPagados),
                backgroundColor: '#F2541B',
            }]
        }
    });
});
</script>
@endpush
