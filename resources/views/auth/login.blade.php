@extends('layouts.guest')

@section('content')
<div class="w-full max-w-md mx-auto bg-white rounded-xl shadow p-8 mt-8 border border-[#2E338C]/10">
    <div class="flex flex-col items-center mb-6">
        <svg class="w-16 h-16 text-[#F2541B] mb-2" fill="currentColor" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" />
        </svg>
        <h1 class="text-2xl font-bold text-[#2E338C]">Iniciar sesión</h1>
        <p class="text-gray-500 text-sm mt-2 text-center">Accede a tu cuenta para gestionar el sistema.</p>
    </div>
    @if (session('status'))
        <div class="mb-4 text-green-600 font-semibold text-sm">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-[#2E338C]">Correo electrónico</label>
            <input id="email" name="email" type="email" required autofocus class="mt-1 block w-full rounded border-gray-300 focus:border-[#F2541B] focus:ring-[#F2541B]" value="{{ old('email') }}">
            @error('email')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-[#2E338C]">Contraseña</label>
            <input id="password" name="password" type="password" required class="mt-1 block w-full rounded border-gray-300 focus:border-[#F2541B] focus:ring-[#F2541B]">
            @error('password')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="flex items-center justify-between mt-2">
            <label class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#2E338C] shadow-sm focus:ring-[#F2541B]" name="remember">
                <span class="ml-2 text-sm text-gray-600">Recordarme</span>
            </label>
            @if (Route::has('password.request'))
                <a class="text-sm text-[#2E338C] hover:underline" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            @endif
        </div>
        <button type="submit" class="w-full py-2 px-4 bg-[#2E338C] text-white font-semibold rounded hover:bg-[#F2541B] transition">Entrar</button>
    </form>
</div>
@endsection
