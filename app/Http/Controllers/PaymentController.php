<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\Resources\Preference as MPPreference;
use MercadoPago\Resources\Preference\Item as MPItem;
use MercadoPago\MercadoPagoConfig;
use App\Models\Models\Pago;
use App\Models\Models\Cliente;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;

class PaymentController extends Controller
{
    public function createPreference(Request $request)
    {
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));

        $item = [
            "title" => $request->input('title'),
            "quantity" => (int) $request->input('quantity', 1),
            "unit_price" => (float) $request->input('price'),
            "currency_id" => 'MXN',
        ];
        $items = [$item];
        $backUrls = [
            'success' => route('payment.success'),
            'failure' => route('payment.failure'),
            'pending' => route('payment.pending'),
        ];
        $requestData = [
            "items" => $items,
            "back_urls" => $backUrls,
            "auto_return" => 'approved',
        ];
        $client = new PreferenceClient();
        try {
            $preference = $client->create($requestData);
            return response()->json([
                'id' => $preference->id,
                'init_point' => $preference->init_point,
            ]);
        } catch (MPApiException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function paymentSuccess(Request $request)
    {
        // Aquí puedes registrar el pago en la base de datos
        // Ejemplo básico:
        Pago::create([
            'cliente_id' => $request->input('cliente_id'),
            'tipo' => 'mercadopago',
            'status' => 'aprobado',
            'monto' => $request->input('monto'),
            'moneda' => $request->input('moneda', 'MXN'),
            'external_id' => $request->input('payment_id'),
            'detalles' => json_encode($request->all()),
        ]);
        return redirect()->route('dashboard')->with('success', 'Pago realizado correctamente.');
    }

    public function paymentFailure(Request $request)
    {
        return redirect()->route('dashboard')->with('error', 'El pago no se pudo completar.');
    }

    public function paymentPending(Request $request)
    {
        return redirect()->route('dashboard')->with('info', 'El pago está pendiente de confirmación.');
    }
}
