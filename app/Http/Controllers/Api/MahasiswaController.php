<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Ambil mahasiswa beserta data prodinya
        return response()->json(Mahasiswa::with('prodi')->get());
    }

    public function getProdi()
    {
        return response()->json(Prodi::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama_mahasiswa' => 'required',
            'alamat' => 'required',
            'prodi_id' => 'required',
        ]);

        $mhs = Mahasiswa::create($request->all());
        return response()->json(['message' => 'Sukses', 'data' => $mhs]);
    }

    public function show($id)
    {
        $mhs = Mahasiswa::find($id);
        if (!$mhs) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($mhs);
    }

    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::findOrFail($id);

        $mhs->nim = $request->nim;
        $mhs->nama_mahasiswa = $request->nama_mahasiswa;
        $mhs->alamat = $request->alamat;
        $mhs->prodi_id = $request->prodi_id;

        $mhs->save();

        return response()->json($mhs);
    }
    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return response()->json(['message' => 'Dihapus']);
    }
}
