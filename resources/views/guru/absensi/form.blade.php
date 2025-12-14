<x-dashboard-layout :title="'Absensi - '.$kelas->nama_kelas">
    <h1 class="text-3xl font-bold mb-6">Absensi Kelas {{ $kelas->nama_kelas }}</h1>

    <form method="POST" action="{{ route('guru.absensi.submit', $kelas->id_kelas) }}">
        @csrf

        <div class="mb-4">
            <label class="font-medium">Tanggal Absensi</label>
            <input type="date" name="tanggal" required class="w-full px-4 py-2 border rounded-lg">
        </div>

        <table class="w-full bg-white border rounded-xl shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-center">Hadir</th>
                    <th class="p-3 text-center">Sakit</th>
                    <th class="p-3 text-center">Izin</th>
                    <th class="p-3 text-center">Alfa</th>
                    <th class="p-3 text-center">Keterangan</th>
                </tr>
            </thead>

            <tbody>
                @foreach($siswa as $s)
                    <tr class="border-b">
                        <td class="p-3">{{ $s->nama }}</td>

                        @foreach(['hadir', 'sakit', 'izin', 'alfa'] as $status)
                            <td class="text-center p-2">
                                <input type="radio" name="status[{{ $s->id_siswa }}]" value="{{ $status }}" required>
                            </td>
                        @endforeach

                        <td class="p-2 text-center">
                            <input type="text" name="keterangan[{{ $s->id_siswa }}]" placeholder="Opsional" class="w-full px-2 py-1 border rounded">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button class="mt-6 px-6 py-3 bg-gradient-to-r from-pink-500 to-yellow-400 text-white rounded-lg shadow hover:opacity-90 transition">
            Simpan Absensi
        </button>
    </form>
</x-dashboard-layout>