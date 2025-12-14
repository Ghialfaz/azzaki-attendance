<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('admin.kelas.index', [
            'kelas' => Kelas::orderBy('nama_kelas', 'ASC')->get()
        ]);
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:50',
            'kuota' => 'required|integer|min:1',
            'tahun_ajaran' => 'required|string|max:20',
            'wali_kelas' => 'required|string|max:100',
        ]);

        Kelas::create($request->all());

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        return view('admin.kelas.edit', [
            'kelas' => Kelas::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:50',
            'kuota' => 'required|integer|min:1',
            'tahun_ajaran' => 'required|string|max:20',
            'wali_kelas' => 'required|string|max:100',
        ]);

        Kelas::findOrFail($id)->update($request->all());

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui!');
    }

    public function delete($id)
    {
        Kelas::findOrFail($id)->delete();

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil dihapus!');
    }
}