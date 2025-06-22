@extends('layouts.app')

@section('content')
<div class="container px-4 py-8 mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Manage CCTV</h1>
        </div>
        <button onclick="openCreateModal()" class="px-4 py-2 text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
            <svg class="inline w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Tambah CCTV
        </button>
    </div>

    <div class="overflow-hidden bg-white rounded-lg shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Latitude</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Longitude</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Stream URL</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($cctvs as $cctv)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $cctv->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $cctv->lat }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $cctv->lng }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <div class="max-w-xs truncate" title="{{ $cctv->stream_url }}">
                                {{ $cctv->stream_url }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                            <button onclick="openEditModal({{ $cctv->id }}, '{{ $cctv->name }}', {{ $cctv->lat }}, {{ $cctv->lng }}, '{{ $cctv->stream_url }}')" 
                                    class="mr-3 text-indigo-600 hover:text-indigo-900">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button onclick="deleteCctv({{ $cctv->id }})" class="text-red-600 hover:text-red-900">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data CCTV</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('cctv.modal')

<script>
let isEditMode = false;

function openCreateModal() {
    isEditMode = false;
    document.getElementById('modalTitle').textContent = 'Tambah CCTV';
    document.getElementById('cctvForm').reset();
    document.getElementById('cctvId').value = '';
    document.getElementById('cctvModal').classList.remove('hidden');
}

function openEditModal(id, name, lat, lng, streamUrl) {
    isEditMode = true;
    document.getElementById('modalTitle').textContent = 'Edit CCTV';
    document.getElementById('cctvId').value = id;
    document.getElementById('name').value = name;
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;
    document.getElementById('stream_url').value = streamUrl;
    document.getElementById('cctvModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('cctvModal').classList.add('hidden');
}

document.getElementById('cctvForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
    
    const url = isEditMode ? `/cctv/${data.id}` : '/cctv';
    const method = isEditMode ? 'POST' : 'POST';
    
    // Tambahkan _method untuk PUT request
    if (isEditMode) {
        data._method = 'PUT';
    }
    
    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            closeModal();
            location.reload();
        } else {
            alert('Terjadi kesalahan: ' + result.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan data');
    });
});

function deleteCctv(id) {
    if (confirm('Apakah Anda yakin ingin menghapus CCTV ini?')) {
        fetch(`/cctv/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                location.reload();
            } else {
                alert('Terjadi kesalahan: ' + result.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus data');
        });
    }
}
</script>
@endsection 