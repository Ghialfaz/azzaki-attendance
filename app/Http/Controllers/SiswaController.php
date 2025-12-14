<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /*** Menampilkan semua siswa lintas kelas */
    public function indexAll()
    {
        $siswa = Siswa::with('kelas')->orderBy('nama')->get();

        return view('admin.siswa.index', compact('siswa'));
    }

    /*** Menampilkan form tambah siswa */
    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('admin.siswa.create', compact('kelas'));
    }

    /*** Menyimpan siswa baru */
    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|integer',
            'nama' => 'required|string|max:191',
            'nama_orangtua' => 'nullable|string|max:191',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable|string',
        ]);

        Siswa::create($request->all());

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /*** Menampilkan form edit siswa */
    public function edit($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('admin.siswa.edit', compact('siswa', 'kelas'));
    }

    /*** Memperbarui data siswa */
    public function update(Request $request, $id_siswa)
    {
        $request->validate([
            'id_kelas' => 'required|integer',
            'nama' => 'required|string|max:191',
            'nama_orangtua' => 'nullable|string|max:191',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable|string',
        ]);

        $siswa = Siswa::findOrFail($id_siswa);
        $siswa->update($request->all());

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    /*** Menghapus siswa */
    public function destroy($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }

    /*** Menampilkan siswa berdasarkan kelas */
    public function byClass($id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);
        $siswa = Siswa::where('id_kelas', $id_kelas)->orderBy('nama')->get();

        return view('admin.siswa.byclass', compact('kelas', 'siswa'));
    }

    /*** Menampilkan semua siswa untuk guru */
    public function guruIndex()
    {
        $siswa = Siswa::with('kelas')->orderBy('nama')->get();

        return view('guru.siswa.index', compact('siswa'));
    }
}