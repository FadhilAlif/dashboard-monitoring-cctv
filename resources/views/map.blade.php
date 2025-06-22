@extends('layouts.app')

@section('head')
    <style>
        #map { height: 6vh; min-height: 350px; }
    </style>
@endsection

@section('content')
    <div class="flex flex-col gap-2 mb-8 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="flex items-center gap-2 text-3xl font-bold text-blue-700">
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764a2 2 0 01-2.447 1.894L15 14M4 6v12a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2z" /></svg>
            Peta CCTV Jogja
        </h1>
        <span class="text-sm text-gray-500">Klik marker untuk melihat streaming</span>
    </div>
    <div class="overflow-hidden bg-white border border-blue-200 shadow-lg rounded-2xl">
        <div id="map" class="w-full"></div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const map = L.map('map').setView([-7.7956, 110.3695], 12);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            }).addTo(map);

            const cctvs = @json($cctvs);

            cctvs.forEach(cctv => {
                const marker = L.marker([cctv.lat, cctv.lng]).addTo(map);
                marker.bindPopup(`
                    <div class='text-sm text-gray-800'>
                        <strong>${cctv.name}</strong><br>
                        <iframe src="${cctv.stream_url}" width="250" height="140" class="rounded" frameborder="0" allowfullscreen></iframe>
                    </div>
                `);
            });
        });
    </script>
@endsection
