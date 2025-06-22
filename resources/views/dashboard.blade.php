@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="flex items-center gap-2 text-3xl font-bold text-blue-700">
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764a2 2 0 01-2.447 1.894L15 14M4 6v12a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2z" /></svg>
            Dashboard CCTV Jogja
        </h1>
        <a href="{{ route('cctv.index') }}" class="px-4 py-2 text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
            <svg class="inline w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Manage CCTV
        </a>
    </div>

    @if($cctvs->isEmpty())
        <div class="p-6 text-center text-gray-600 bg-yellow-100 shadow rounded-xl">
            Belum ada data CCTV tersedia.
        </div>
    @else
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($cctvs as $cctv)
                <div class="flex flex-col p-0 overflow-hidden transition bg-white border border-gray-100 shadow-lg group rounded-2xl hover:shadow-2xl hover:border-blue-300">
                    <div class="relative overflow-hidden aspect-video">
                        <iframe 
                            src="{{ $cctv->stream_url }}" 
                            class="w-full h-full transition-transform duration-300 border-0 rounded-t-2xl group-hover:scale-105" 
                            frameborder="0"
                            allowfullscreen
                        ></iframe>
                        <span class="absolute px-2 py-1 text-xs text-white bg-blue-600 rounded shadow top-2 right-2">LIVE</span>
                    </div>
                    <div class="flex flex-col justify-between flex-1 p-4">
                        <h2 class="mb-1 text-lg font-semibold text-gray-800 truncate">{{ $cctv->name }}</h2>
                        @if ($cctv->location)
                            <p class="mb-2 text-sm text-gray-500">{{ $cctv->location }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
