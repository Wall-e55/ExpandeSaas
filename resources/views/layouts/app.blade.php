<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CRM SaaS') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background: #f4f6fa; }
        .sidebar {
            background: #2E338C; /* Azul sólido, sin degradado */
            color: #fff;
            min-height: 100vh;
            width: 220px;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
        }
        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            padding: 2rem 1rem 1rem 1.5rem;
            color: #fff;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .sidebar nav {
            margin-top: 2rem;
        }
        .sidebar nav a,
        .sidebar nav button[type="submit"] {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #fff;
            padding: 0.75rem 1.2rem;
            text-decoration: none;
            border-left: 4px solid transparent;
            border-radius: 999px;
            font-size: 1.08rem;
            font-weight: 500;
            margin: 0.3rem 0.5rem;
            transition: background 0.2s, border-color 0.2s, color 0.2s;
            width: calc(100% - 1rem);
            box-sizing: border-box;
        }
        .sidebar nav a.active, .sidebar nav a:hover,
        .sidebar nav button[type="submit"]:hover {
            background: #F2541B;
            color: #fff;
            border-left: 4px solid #F2541B;
            border-radius: 999px;
            box-shadow: 0 2px 8px 0 rgba(242,84,27,0.08);
        }
        .sidebar nav button[type="submit"] {
            background: #fff2ee;
            border: none;
            color: #F2541B;
            text-align: left;
            cursor: pointer;
        }
        .sidebar nav button[type="submit"] svg {
            color: #F2541B;
            fill: none;
            transition: color 0.2s, fill 0.2s;
        }
        .sidebar nav button[type="submit"]:hover svg {
            color: #fff;
            fill: #fff;
        }
        .sidebar nav a svg {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            color: #6EC1E4; /* Azul claro, más estético */
            fill: none;
            transition: color 0.2s, fill 0.2s;
        }
        .sidebar nav a.active svg, .sidebar nav a:hover svg {
            color: #fff;
            fill: #fff;
        }
        .sidebar nav svg {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            color: #F2541B;
            fill: none;
            transition: color 0.2s, fill 0.2s;
        }
        .main-content {
            margin-left: 220px;
            padding: 2rem 2rem 2rem 2rem;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" style="height:90px; width:auto; display:block; margin:0 auto;">
        </div>
        <nav>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><path d="M3 13.5V19a2 2 0 002 2h3v-5h4v5h3a2 2 0 002-2v-5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/><path d="M12 3L2 12h20L12 3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
                Dashboard
            </a>
            <a href="{{ route('clientes.index') }}" class="{{ request()->routeIs('clientes.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2" fill="none"/><path d="M4 20c0-4 8-4 8-4s8 0 8 4" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                Clientes
            </a>
            <a href="{{ route('productos.index') }}" class="{{ request()->routeIs('productos.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="2" stroke="currentColor" stroke-width="2" fill="none"/><path d="M16 3v4M8 3v4" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                Productos
            </a>
            <a href="{{ route('servicios.index') }}" class="{{ request()->routeIs('servicios.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                Servicios
            </a>
            <a href="{{ route('pagos.index') }}" class="{{ request()->routeIs('pagos.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="10" rx="2" stroke="currentColor" stroke-width="2" fill="none"/><path d="M6 11h12" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                Pagos
            </a>
            <a href="{{ route('tickets.index') }}" class="{{ request()->routeIs('tickets.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2" stroke="currentColor" stroke-width="2" fill="none"/><path d="M7 7V5a2 2 0 012-2h6a2 2 0 012 2v2" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                Tickets
            </a>
            <a href="{{ route('citas.index') }}" class="{{ request()->routeIs('citas.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2" fill="none"/><path d="M16 3v4M8 3v4M3 9h18" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                Citas
            </a>
            <a href="{{ route('contactos.index') }}" class="{{ request()->routeIs('contactos.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2" fill="none"/><path d="M4 20c0-4 8-4 8-4s8 0 8 4" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                Contactos
            </a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">
                    <svg viewBox="0 0 24 24"><path d="M16 17l5-5-5-5M21 12H9" stroke="currentColor" stroke-width="2" fill="none"/><rect x="3" y="4" width="8" height="16" rx="2" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                    <span style="font-weight:600;">Cerrar sesión</span>
                </button>
            </form>
        </nav>
    </div>
    <div class="main-content">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>
