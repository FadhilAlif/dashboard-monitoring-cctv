<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CCTV Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('head') {{-- Tambahan head opsional seperti Leaflet CSS --}}
</head>
<body class="min-h-screen text-gray-800 bg-gray-100">
    <!-- Navbar modern & responsif -->
    <nav class="sticky top-0 z-50 bg-white shadow">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764a2 2 0 01-2.447 1.894L15 14M4 6v12a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2z" /></svg>
                    </span>
                    <a href="{{ url('/') }}" class="text-2xl font-bold tracking-tight text-blue-700">CCTV Jogja</a>
                </div>
                <div class="items-center hidden gap-6 md:flex">
                    <a href="{{ url('/dashboard') }}" class="font-medium text-gray-700 transition hover:text-blue-600">Dashboard</a>
                    <a href="{{ url('/map') }}" class="font-medium text-gray-700 transition hover:text-blue-600">Peta</a>
                </div>
                <!-- Hamburger -->
                <div class="flex items-center md:hidden">
                    <button id="nav-toggle" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>
                </div>
            </div>
            <!-- Mobile menu -->
            <div id="nav-menu" class="flex-col hidden gap-2 pb-4 md:hidden">
                <a href="{{ url('/dashboard') }}" class="block px-2 py-2 font-medium text-gray-700 transition hover:text-blue-600">Dashboard</a>
                <a href="{{ url('/map') }}" class="block px-2 py-2 font-medium text-gray-700 transition hover:text-blue-600">Peta</a>
            </div>
        </div>
    </nav>
    <script>
        // Hamburger menu toggle
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('nav-toggle');
            const menu = document.getElementById('nav-menu');
            if (toggle && menu) {
                toggle.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
            }
        });
    </script>
    <!-- Main content -->
    <main class="p-4 mx-auto max-w-7xl">
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>
