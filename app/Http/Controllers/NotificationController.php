<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\CustomEmailNotification;
use App\Models\User;

class NotificationController extends Controller
{
    public function sendCustomEmail(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        $user = User::findOrFail($request->user_id);
        $user->notify(new CustomEmailNotification($request->subject, $request->message));
        return response()->json(['success' => true, 'message' => 'Correo enviado correctamente.']);
    }
}
