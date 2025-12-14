<x-dashboard-layout :title="'Edit Absensi - '.$kelas->nama_kelas">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-3xl font-bold">Edit Absensi — {{ $kelas->nama_kelas }}</h1>

        <a href="{{ route('guru.rekap.tanggal', $kelas->id_kelas) }}" class="px-3 py-2 bg-gray-500/20 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-500/30 hover:border-gray-400 transition text-sm font-medium">
            Kembali ke Pilih Tanggal
        </a>
    </div>

    <div class="bg-white p-6 rounded-xl shadow border max-w-4xl">
        <form action="{{ route('guru.rekap.update', ['id_kelas' => $kelas->id_kelas, 'tanggal' => $tanggal]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="font-medium">Tanggal</label>
                <input type="date" name="tanggal_display" value="{{ $tanggal }}" disabled class="w-full px-4 py-2 border rounded-lg bg-gray-50">
            </div>

            <table class="w-full border-collapse mb-4">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left font-medium">Nama Siswa</th>
                        <th class="p-3 text-center font-medium">Hadir</th>
                        <th class="p-3 text-center font-medium">Sakit</th>
                        <th class="p-3 text-center font-medium">Izin</th>
                        <th class="p-3 text-center font-medium">Alfa</th>
                        <th class="p-3 text-left font-medium">Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($siswa as $s)
                        @php
                            $row = $absensiRows[$s->id_siswa] ?? null;
                        @endphp

                        <tr class="border-b">
                            <td class="p-3">{{ $s->nama }}</td>

                            @foreach(['hadir', 'sakit', 'izin', 'alfa'] as $status)
                                <td class="text-center p-2">
                                    <input type="radio" name="status[{{ $s->id_siswa }}]" value="{{ $status }}" {{ ($row && $row->status === $status) ? 'checked' : '' }} required>
                                </td>
                            @endforeach

                            <td class="p-2">
                                <input type="text" name="keterangan[{{ $s->id_siswa }}]" value="{{ $row->keterangan ?? '' }}" class="w-full px-2 py-1 border rounded">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex gap-3">
                <a href="{{ route('guru.rekap.tanggal', $kelas->id_kelas) }}" class="px-4 py-2 border rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>

                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-pink-500 to-yellow-400 text-white rounded-lg shadow hover:opacity-90 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-dashboard-layout>