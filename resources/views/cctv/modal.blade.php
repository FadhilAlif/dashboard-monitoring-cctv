<!-- Modal Create/Edit -->
<div id="cctvModal" class="fixed inset-0 z-50 hidden bg-gray-600 bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-md bg-white rounded-lg shadow-xl">
            <div class="flex items-center justify-between p-6 border-b">
                <h3 id="modalTitle" class="text-lg font-semibold text-gray-900">Tambah CCTV</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form id="cctvForm" class="p-6">
                <input type="hidden" id="cctvId" name="id">
                
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nama CCTV</label>
                    <input type="text" id="name" name="name" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="mb-4">
                    <label for="lat" class="block mb-2 text-sm font-medium text-gray-700">Latitude</label>
                    <input type="number" id="lat" name="lat" step="any" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="mb-4">
                    <label for="lng" class="block mb-2 text-sm font-medium text-gray-700">Longitude</label>
                    <input type="number" id="lng" name="lng" step="any" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="mb-6">
                    <label for="stream_url" class="block mb-2 text-sm font-medium text-gray-700">Stream URL</label>
                    <input type="url" id="stream_url" name="stream_url" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" 
                            class="px-4 py-2 text-gray-700 transition-colors bg-gray-200 rounded-md hover:bg-gray-300">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 text-white transition-colors bg-blue-600 rounded-md hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 