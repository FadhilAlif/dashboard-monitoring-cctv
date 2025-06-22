<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CCTV Jogja - Platform Monitoring Realtime</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-800 bg-gray-50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <!-- Navbar -->
            <nav class="sticky top-0 z-50 shadow-sm bg-white/80 backdrop-blur-md">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764a2 2 0 01-2.447 1.894L15 14M4 6v12a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2z"></path></svg>
                            </span>
                            <span class="text-xl font-bold text-blue-700">CCTV Jogja</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-sm font-medium text-white transition bg-blue-600 rounded-lg shadow hover:bg-blue-700">Masuk Dashboard</a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Hero Section -->
            <header class="relative overflow-hidden bg-white">
                <div class="px-4 py-20 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:py-32">
                    <div class="text-center">
                        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block">Selamat Datang di CCTV Jogja</span>
                        </h1>
                        <p class="max-w-2xl mx-auto mt-4 text-lg text-gray-600 sm:text-xl">
                            Platform pemantauan CCTV terintegrasi untuk Daerah Istimewa Yogyakarta.
                        </p>
                    </div>
                </div>
            </header>

            <!-- Cards Section -->
            <main class="py-16 bg-gray-50">
                <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                        <!-- Card 1: Dashboard -->
                        <a href="{{ url('/dashboard') }}" class="block p-8 transition bg-white border border-gray-100 shadow-lg group rounded-2xl hover:shadow-xl hover:border-blue-300">
                            <h2 class="mb-2 text-2xl font-bold text-gray-900">Dashboard Monitoring</h2>
                            <p class="text-gray-600">Lihat semua stream CCTV aktif di Daerah Istimewa Yogyakarta dalam satu tampilan grid yang mudah.</p>
                            <span class="inline-flex items-center mt-4 font-semibold text-blue-600 group-hover:underline">
                                Buka Dashboard &rarr;
                            </span>
                        </a>
                        <!-- Card 2: Map -->
                        <a href="{{ url('/map') }}" class="block p-8 transition bg-white border border-gray-100 shadow-lg group rounded-2xl hover:shadow-xl hover:border-blue-300">
                            <h2 class="mb-2 text-2xl font-bold text-gray-900">Peta CCTV (GIS)</h2>
                            <p class="text-gray-600">Jelajahi lokasi CCTV secara geografis melalui peta interaktif untuk pemantauan berbasis lokasi.</p>
                            <span class="inline-flex items-center mt-4 font-semibold text-blue-600 group-hover:underline">
                                Buka Peta &rarr;
                            </span>
                        </a>
                    </div>
                </div>
            </main>

            <!-- Profile Section -->
            <section class="py-20 bg-white">
                <div class="grid items-center gap-12 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 md:grid-cols-2">
                    <div>
                        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1932&auto=format&fit=crop" alt="Tim Life Media" class="shadow-xl rounded-2xl">
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Tentang Life Media</h2>
                        <p class="mt-4 text-gray-600">Life Media adalah penyedia layanan internet yang menawarkan solusi digital seperti FTTH untuk koneksi internet cepat, Broadband & Dedicated internet untuk kebutuhan bisnis, serta Hospitality TV dan IPTV untuk hiburan digital. Layanan ini mendukung konektivitas dan hiburan untuk kebutuhan pribadi maupun profesional.</p>
                        <p class="mt-4 text-gray-600">Life Media telah meraih sertifikasi sebagai bentuk komitmen kami dalam memberikan layanan terbaik yang sesuai dengan standar kualitas untuk pelanggan.</p>
                    </div>
                </div>
            </section>

            <!-- Partners Section -->
            <section class="py-20 bg-gray-50">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-gray-900">Memantau Secara Realtime</h2>
                        <p class="mt-2 text-lg text-gray-600">Melihat Jogja dengan lebih mudah.</p>
                    </div>
                    <div class="grid items-center grid-cols-2 gap-8 mt-12 sm:grid-cols-3 md:grid-cols-5">
                        <img src="https://tailwindui.com/img/logos/158x48/transistor-logo-gray-400.svg" alt="Transistor" class="object-contain w-full h-12">
                        <img src="https://tailwindui.com/img/logos/158x48/reform-logo-gray-400.svg" alt="Reform" class="object-contain w-full h-12">
                        <img src="https://tailwindui.com/img/logos/158x48/tuple-logo-gray-400.svg" alt="Tuple" class="object-contain w-full h-12">
                        <img src="https://tailwindui.com/img/logos/158x48/savvycal-logo-gray-400.svg" alt="SavvyCal" class="object-contain w-full h-12">
                        <img src="https://tailwindui.com/img/logos/158x48/statamic-logo-gray-400.svg" alt="Statamic" class="object-contain w-full h-12">
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="text-white bg-gray-800">
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                        <div>
                            <h3 class="text-lg font-semibold">Kantor</h3>
                            <p class="mt-2 text-gray-400">Jl. Ring Road Utara, Condongcatur, Depok, Sleman, Daerah Istimewa Yogyakarta 55283</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Hubungi Kami</h3>
                            <p class="mt-2 text-gray-400">Email: support@lifemedia.id</p>
                            <p class="text-gray-400">Telepon: (0274) 123 456</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Media Sosial</h3>
                            <div class="flex gap-4 mt-2">
                                <a href="#" class="text-gray-400 transition hover:text-white">Facebook</a>
                                <a href="#" class="text-gray-400 transition hover:text-white">Twitter</a>
                                <a href="#" class="text-gray-400 transition hover:text-white">Instagram</a>
                            </div>
                        </div>
                    </div>
                    <div class="pt-8 mt-8 text-sm text-center text-gray-500 border-t border-gray-700">
                        &copy; {{ date('Y') }} CCTV Jogja by Life Media. All rights reserved.
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
