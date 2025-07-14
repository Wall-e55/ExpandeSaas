<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Models\Cliente;
use App\Models\Models\Producto;
use App\Models\Models\Servicio;
use App\Models\Models\Pago;
use App\Models\Models\Ticket;
use App\Models\Models\Cita;
use App\Models\Models\Reporte;
use App\Models\Models\Contacto;

class DashboardController extends Controller
{
    public function index()
    {
        // Totales para tarjetas
        $totalUsuarios = User::count();
        $totalClientes = Cliente::count();
        $totalProductos = Producto::count();
        $totalServicios = Servicio::count();
        $totalPagos = Pago::count();
        $totalTickets = Ticket::count();
        $totalCitas = Cita::count();
        $totalReportes = Reporte::count();
        $totalContactos = Contacto::count();

        // Ventas por mes (pagos)
        $ventasPorMes = Pago::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        // Productos más pagados (top 5)
        $productosMasVendidos = Producto::select('nombre')
            ->withCount('pagos')
            ->orderByDesc('pagos_count')
            ->limit(5)
            ->pluck('pagos_count', 'nombre');

        // Tickets por estado
        $ticketsPorEstado = Ticket::select('estado', DB::raw('COUNT(*) as total'))
            ->groupBy('estado')
            ->pluck('total', 'estado');

        // Citas por mes
        $citasPorMes = Cita::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        // Productos y servicios más pagados (top 5)
        $productosMasPagados = Producto::select('nombre')
            ->withCount('pagos')
            ->orderByDesc('pagos_count')
            ->limit(5)
            ->pluck('pagos_count', 'nombre');
        $serviciosMasPagados = Servicio::select('nombre')
            ->withCount('pagos')
            ->orderByDesc('pagos_count')
            ->limit(5)
            ->pluck('pagos_count', 'nombre');

        return view('dashboard', [
            'totalUsuarios' => $totalUsuarios,
            'totalClientes' => $totalClientes,
            'totalProductos' => $totalProductos,
            'totalServicios' => $totalServicios,
            'totalPagos' => $totalPagos,
            'totalTickets' => $totalTickets,
            'totalCitas' => $totalCitas,
            'totalReportes' => $totalReportes,
            'totalContactos' => $totalContactos,
            'ventasPorMes' => $ventasPorMes,
            'productosMasVendidos' => $productosMasVendidos, // ahora sí son los más pagados
            'ticketsPorEstado' => $ticketsPorEstado,
            'citasPorMes' => $citasPorMes,
            'productosMasPagados' => $productosMasPagados,
            'serviciosMasPagados' => $serviciosMasPagados,
        ]);
    }
}
