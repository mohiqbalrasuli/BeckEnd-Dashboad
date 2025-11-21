<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index() {
        return response()->json(Prodi::all());
    }

    public function store(Request $request) {
        $request->validate([
            'nama_prodi' => 'required|unique:prodis',
            'fakultas' => 'required'
        ]);

        $prodi = Prodi::create($request->all());
        return response()->json(['message' => 'Sukses', 'data' => $prodi]);
    }

    public function show($id) {
        $prodi = Prodi::find($id);
        if (!$prodi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($prodi);
    }

    public function update(Request $request, $id) {
        $prodi = Prodi::findOrFail($id);

        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->fakultas = $request->fakultas;

        $prodi->save();

        return response()->json($prodi);
    }

    public function destroy($id) {
        Prodi::destroy($id);
        return response()->json(['message' => 'Dihapus']);
    }
}
