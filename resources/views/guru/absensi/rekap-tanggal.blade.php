<!-- filepath: /opt/lampp/htdocs/azzaki-attendance/resources/views/guru/absensi/rekap-tanggal.blade.php -->
<x-dashboard-layout :title="'Rekap Absensi - '.$kelas->nama_kelas">
    <h1 class="text-3xl font-bold mb-6">Rekap Absensi Kelas {{ $kelas->nama_kelas }}</h1>

    <div class="bg-white p-6 rounded-xl shadow border max-w-lg">
        <form method="POST" action="{{ route('guru.rekap.hasil', $kelas->id_kelas) }}">
            @csrf

            <label class="font-medium mb-2 block">Pilih Tanggal Absensi</label>
            <input type="date" name="tanggal" required class="w-full px-4 py-2 border rounded-lg mb-4">

            <button class="px-6 py-3 bg-gradient-to-r from-pink-500 to-yellow-400 text-white rounded-lg shadow w-full hover:opacity-90 transition">
                Lihat Rekap
            </button>
        </form>
    </div>
</x-dashboard-layout>