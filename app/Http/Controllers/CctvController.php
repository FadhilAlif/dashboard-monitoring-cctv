<?php

namespace App\Http\Controllers;

use App\Models\Cctv;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CctvController extends Controller
{
    /**
     * Menampilkan halaman manage CCTV
     */
    public function index()
    {
        $cctvs = Cctv::all();
        return view('cctv.index', compact('cctvs'));
    }

    /**
     * Menyimpan data CCTV baru
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'stream_url' => 'required|url'
        ]);

        $cctv = Cctv::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'CCTV berhasil ditambahkan',
            'data' => $cctv
        ]);
    }

    /**
     * Mengupdate data CCTV
     */
    public function update(Request $request, Cctv $cctv): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'stream_url' => 'required|url'
        ]);

        // Hapus _method dari data yang akan diupdate
        $data = $request->except(['_method']);
        $cctv->update($data);

        return response()->json([
            'success' => true,
            'message' => 'CCTV berhasil diperbarui',
            'data' => $cctv
        ]);
    }

    /**
     * Menghapus data CCTV
     */
    public function destroy(Cctv $cctv): JsonResponse
    {
        $cctv->delete();

        return response()->json([
            'success' => true,
            'message' => 'CCTV berhasil dihapus'
        ]);
    }
} 