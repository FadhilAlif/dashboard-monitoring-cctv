@extends('layouts.app')

@section('head')
    <style>
        #map { 
            height: calc(100vh - 180px); /* 160px = estimasi header+judul+footer, sesuaikan jika perlu */
            min-height: 350px; 
            border-radius: 1rem; 
        }
        .leaflet-popup-content { min-width: 260px; }
    </style>
@endsection

@section('content')
    <div class="mb-4">
        <h1 class="text-4xl font-extrabold text-[#B03A4B] mb-1 tracking-tight">PETA CCTV JOGJA</h1>
        <div class="mb-4 text-base font-medium tracking-wide text-black">PLATFROM CCTV DAERAH ISTIMEWA YOGYAKARTA</div>
    </div>
    <div class="p-2 overflow-hidden bg-white border border-blue-200 shadow-lg rounded-2xl">
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
                const popupContent = `
                    <div class='text-sm text-gray-800'>
                        <div class="font-bold text-[#B03A4B] mb-1">${cctv.name}</div>
                        ${cctv.location ? `<div class="mb-2 text-xs text-gray-500"><i class="fa fa-map-marker-alt"></i> ${cctv.location}</div>` : ''}
                        <div class="mb-1 overflow-hidden border border-gray-200 rounded">
                            <iframe src="${cctv.stream_url}" width="250" height="140" class="rounded" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                `;
                const marker = L.marker([cctv.lat, cctv.lng]).addTo(map);
                marker.bindPopup(popupContent);
            });
        });
    </script>
    <!-- Optional: FontAwesome for location icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
@endsection
