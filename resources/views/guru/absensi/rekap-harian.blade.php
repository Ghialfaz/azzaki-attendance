<!-- filepath: /opt/lampp/htdocs/azzaki-attendance/resources/views/guru/absensi/rekap-harian.blade.php -->
<x-dashboard-layout :title="'Rekap - '.$kelas->nama_kelas">
    <div class="flex items-start justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold">Rekap Absensi - {{ $kelas->nama_kelas }}</h1>
            <p class="text-sm text-gray-600">Tahun Ajaran: {{ $kelas->tahun_ajaran ?? '-' }}</p>
            <p class="text-sm text-gray-600">Tanggal: <strong>{{ $tanggal }}</strong></p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('guru.rekap.edit', ['id_kelas' => $kelas->id_kelas, 'tanggal' => $tanggal]) }}" class="px-3 py-2 bg-blue-500/20 text-blue-600 border border-blue-300 rounded-lg hover:bg-blue-500/30 hover:border-blue-400 transition text-sm font-medium">
                Edit Absensi Hari Ini
            </a>

            <form action="{{ route('guru.rekap.delete', ['id_kelas' => $kelas->id_kelas, 'tanggal' => $tanggal]) }}" method="POST" onsubmit="return confirm('Hapus semua absensi untuk tanggal {{ $tanggal }}?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-2 bg-red-500/20 text-red-600 border border-red-300 rounded-lg hover:bg-red-500/30 hover:border-red-400 transition text-sm font-medium">
                    Hapus Seluruh Absensi
                </button>
            </form>

            <a href="{{ route('guru.rekap.export.pdf', ['id_kelas' => $kelas->id_kelas, 'tanggal' => $tanggal]) }}" class="px-3 py-2 bg-gray-500/20 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-500/30 hover:border-gray-400 transition text-sm font-medium">
                Export PDF
            </a>

            <a href="{{ route('guru.rekap.excel', [$kelas->id_kelas, $tanggal]) }}" class="px-3 py-2 bg-green-500/20 text-green-600 border border-green-300 rounded-lg hover:bg-green-500/30 hover:border-green-400 transition text-sm font-medium">
                Export Excel
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-xl shadow border">
        <div class="mb-4 grid grid-cols-4 gap-4">
            @php
                $counts = $absensi->groupBy('status')->map->count();
                $hadir = $counts['hadir'] ?? 0;
                $sakit = $counts['sakit'] ?? 0;
                $izin = $counts['izin'] ?? 0;
                $alfa = $counts['alfa'] ?? 0;
            @endphp

            <div class="p-4 bg-blue-50 rounded">
                <div class="text-sm text-gray-600">Hadir</div>
                <div class="text-xl font-bold">{{ $hadir }}</div>
            </div>

            <div class="p-4 bg-red-50 rounded">
                <div class="text-sm text-gray-600">Sakit</div>
                <div class="text-xl font-bold">{{ $sakit }}</div>
            </div>

            <div class="p-4 bg-yellow-50 rounded">
                <div class="text-sm text-gray-600">Izin</div>
                <div class="text-xl font-bold">{{ $izin }}</div>
            </div>

            <div class="p-4 bg-pink-50 rounded">
                <div class="text-sm text-gray-600">Alfa</div>
                <div class="text-xl font-bold">{{ $alfa }}</div>
            </div>
        </div>

        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left font-medium">Nama Siswa</th>
                    <th class="p-3 text-center font-medium">Status</th>
                    <th class="p-3 text-left font-medium">Keterangan</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($absensi as $a)
                    <tr class="border-b">
                        <td class="p-3">{{ $a->siswa->nama }}</td>
                        <td class="p-3 text-center capitalize">{{ $a->status }}</td>
                        <td class="p-3">{{ $a->keterangan ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-500">
                            Tidak ada data absensi pada tanggal tersebut.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-dashboard-layout>