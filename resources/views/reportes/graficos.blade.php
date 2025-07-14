@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8 mt-8">
    <h1 class="text-2xl font-bold text-[#2E338C] mb-6">Reportes con Gráficos</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <h2 class="text-lg font-semibold mb-2">Gráfico de Barras</h2>
            <canvas id="barChart"></canvas>
        </div>
        <div>
            <h2 class="text-lg font-semibold mb-2">Gráfico Circular</h2>
            <canvas id="pieChart"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Gráfico de Barras
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril'],
            datasets: [{
                label: 'Ventas',
                data: [12, 19, 3, 5],
                backgroundColor: '#2E338C',
            }]
        }
    });
    // Gráfico Circular
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: ['Producto A', 'Producto B', 'Producto C'],
            datasets: [{
                data: [10, 20, 30],
                backgroundColor: ['#2E338C', '#F2541B', '#4BC0C0'],
            }]
        }
    });
});
</script>
@endpush
