<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware(['web', 'tenant'])->group(function () {
    Route::post('/pagos/preferencia', [PaymentController::class, 'createPreference'])->name('tenant.payment.preference');
    Route::get('/pagos/success', [PaymentController::class, 'paymentSuccess'])->name('tenant.payment.success');
    Route::get('/pagos/failure', [PaymentController::class, 'paymentFailure'])->name('tenant.payment.failure');
    Route::get('/pagos/pending', [PaymentController::class, 'paymentPending'])->name('tenant.payment.pending');
});
