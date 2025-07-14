<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FirstUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Evitar conflicto de rutas duplicadas para '/'
// Solo definir la ruta '/' una vez, y que sea condicional
Route::get('/', function () {
    if (\App\Models\User::count() === 0) {
        return redirect()->route('first-user.form');
    }
    return redirect()->route('dashboard');
});

// Compatibilidad con Breeze: redirigir /dashboard (nombre dashboard) al dashboard real
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Formulario especial para crear el primer usuario (solo si no hay usuarios)
Route::get('/first-user', [FirstUserController::class, 'showForm'])->name('first-user.form');
Route::post('/first-user', [FirstUserController::class, 'store'])->name('first-user.store');

// Redirección automática si no hay usuarios
Route::middleware([])->group(function () {
    Route::get('/login', function () {
        if (\App\Models\User::count() === 0) {
            return redirect()->route('first-user.form');
        }
        return view('auth.login');
    })->name('login');
    Route::get('/register', function () {
        if (\App\Models\User::count() === 0) {
            return redirect()->route('first-user.form');
        }
        abort(404);
    })->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para los módulos principales del CRM
    Route::get('/clientes', [\App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/productos', [\App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');
    Route::get('/servicios', [\App\Http\Controllers\ServicioController::class, 'index'])->name('servicios.index');
    Route::get('/pagos', [\App\Http\Controllers\PagoController::class, 'index'])->name('pagos.index');
    Route::get('/tickets', [\App\Http\Controllers\TicketController::class, 'index'])->name('tickets.index');
    Route::get('/citas', [\App\Http\Controllers\CitaController::class, 'index'])->name('citas.index');
    Route::get('/reportes', [\App\Http\Controllers\ReporteController::class, 'index'])->name('reportes.index');

    // Rutas CRUD completas para todos los módulos principales del CRM
    Route::resource('clientes', \App\Http\Controllers\ClienteController::class);
    Route::resource('productos', \App\Http\Controllers\ProductoController::class);
    Route::resource('servicios', \App\Http\Controllers\ServicioController::class);
    Route::resource('pagos', \App\Http\Controllers\PagoController::class);
    Route::resource('tickets', \App\Http\Controllers\TicketController::class);
    Route::resource('citas', \App\Http\Controllers\CitaController::class);
    Route::resource('reportes', \App\Http\Controllers\ReporteController::class);
    Route::resource('contactos', \App\Http\Controllers\ContactoController::class);
});

require __DIR__ . '/auth.php';
