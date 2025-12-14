<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AbsensiController extends Controller
{
    public function kelasList($mode)
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();

        if (!in_array($mode, ['absen', 'rekap'])) {
            abort(404);
        }

        return view('guru.absensi.kelas', compact('kelas', 'mode'));
    }

    public function form($id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);
        $siswa = Siswa::where('id_kelas', $id_kelas)->orderBy('nama')->get();

        return view('guru.absensi.form', compact('kelas', 'siswa'));
    }

    public function store(Request $request, $id_kelas)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'status.*' => 'required|in:hadir,sakit,izin,alfa'
        ]);

        foreach ($request->status as $id_siswa => $status) {
            Absensi::create([
                'tanggal' => $request->tanggal,
                'id_kelas' => $id_kelas,
                'id_siswa' => $id_siswa,
                'status' => $status,
                'keterangan' => $request->keterangan[$id_siswa] ?? null,
            ]);
        }

        return redirect()->route('guru.absensi.kelas')
            ->with('success', 'Absensi berhasil disimpan.');
    }

    public function rekapTanggal($id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);

        return view('guru.absensi.rekap-tanggal', compact('kelas'));
    }

    public function rekapHarian(Request $request, $id_kelas)
    {
        $request->validate([
            'tanggal' => 'required|date'
        ]);

        $kelas = Kelas::findOrFail($id_kelas);

        $absensi = Absensi::with('siswa')
            ->where('id_kelas', $id_kelas)
            ->where('tanggal', $request->tanggal)
            ->orderBy('id_siswa')
            ->get();

        return view('guru.absensi.rekap-harian', [
            'kelas' => $kelas,
            'tanggal' => $request->tanggal,
            'absensi' => $absensi
        ]);
    }

    public function editHarian($id_kelas, $tanggal)
    {
        $kelas = Kelas::findOrFail($id_kelas);

        $siswa = Siswa::where('id_kelas', $id_kelas)->orderBy('nama')->get();

        $absensiRows = Absensi::where('id_kelas', $id_kelas)
            ->where('tanggal', $tanggal)
            ->get()
            ->keyBy('id_siswa');

        return view('guru.absensi.edit-harian', [
            'kelas' => $kelas,
            'tanggal' => $tanggal,
            'siswa' => $siswa,
            'absensiRows' => $absensiRows
        ]);
    }

    public function updateHarian(Request $request, $id_kelas, $tanggal)
    {
        $request->validate([
            'status' => 'required|array',
            'status.*' => 'required|in:hadir,sakit,izin,alfa',
            'keterangan' => 'nullable|array',
        ]);

        $statuses = $request->input('status', []);
        $keterangan = $request->input('keterangan', []);

        DB::transaction(function () use ($id_kelas, $tanggal, $statuses, $keterangan) {
            foreach ($statuses as $id_siswa => $status) {
                $keterangan_value = $keterangan[$id_siswa] ?? null;

                $abs = Absensi::where('id_kelas', $id_kelas)
                    ->where('id_siswa', $id_siswa)
                    ->where('tanggal', $tanggal)
                    ->first();

                if ($abs) {
                    $abs->update([
                        'status' => $status,
                        'keterangan' => $keterangan_value,
                    ]);
                } else {
                    Absensi::create([
                        'tanggal' => $tanggal,
                        'id_kelas' => $id_kelas,
                        'id_siswa' => $id_siswa,
                        'status' => $status,
                        'keterangan' => $keterangan_value,
                    ]);
                }
            }
        });

        return redirect()->route('guru.rekap.hasil', ['id_kelas' => $id_kelas])
            ->withInput(['tanggal' => $tanggal])
            ->with('success', 'Perubahan absensi untuk tanggal ' . $tanggal . ' berhasil disimpan.');
    }

    public function deleteHarian($id_kelas, $tanggal)
    {
        Absensi::where('id_kelas', $id_kelas)
            ->where('tanggal', $tanggal)
            ->delete();

        return redirect()->route('guru.kelas', ['mode' => 'rekap'])
            ->with('success', 'Absensi pada tanggal ' . $tanggal . ' telah dihapus.');
    }

    public function exportPdf($id_kelas, $tanggal)
    {
        $kelas = Kelas::findOrFail($id_kelas);
        $absensi = Absensi::with('siswa')
            ->where('id_kelas', $id_kelas)
            ->where('tanggal', $tanggal)
            ->orderBy('id_siswa')
            ->get();

        $pdf = Pdf::loadView('guru.absensi.export-pdf', [
            'kelas' => $kelas,
            'tanggal' => $tanggal,
            'absensi' => $absensi
        ]);

        return $pdf->download("rekap-{$kelas->nama_kelas}-{$tanggal}.pdf");
    }

    public function exportExcel($id_kelas, $tanggal)
    {
        $kelas = Kelas::findOrFail($id_kelas);

        $absensi = Absensi::with('siswa')
            ->where('id_kelas', $id_kelas)
            ->where('tanggal', $tanggal)
            ->orderBy('id_siswa')
            ->get();

        $filename = "rekap-{$kelas->nama_kelas}-{$tanggal}.csv";

        return response()->streamDownload(function () use ($absensi) {
            $FH = fopen('php://output', 'w');

            fprintf($FH, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($FH, ['Nama Siswa', 'Status', 'Keterangan']);

            foreach ($absensi as $a) {
                fputcsv($FH, [
                    $a->siswa->nama,
                    $a->status,
                    $a->keterangan ?? '-'
                ]);
            }

            fclose($FH);

        }, $filename, [
            "Content-Type" => "text/csv",
            "Cache-Control" => "no-store, no-cache, must-revalidate",
            "Pragma" => "no-cache",
        ]);
    }
}