<x-dashboard-layout :title="$mode === 'absen' ? 'Input Absensi' : 'Rekap Absensi'">
    <h1 class="text-3xl font-bold mb-6">
        {{ $mode === 'absen' ? 'Pilih Kelas untuk Input Absensi' : 'Pilih Kelas untuk Rekap Absensi' }}
    </h1>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-xl shadow border border-gray-200">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 font-medium text-gray-700">Nama Kelas</th>
                    <th class="p-3 font-medium text-gray-700">Kuota</th>
                    <th class="p-3 font-medium text-gray-700">Tahun Ajaran</th>
                    <th class="p-3 font-medium text-gray-700">Wali Kelas</th>
                    <th class="p-3 font-medium text-gray-700 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($kelas as $k)
                    <tr class="border-b">
                        <td class="p-3">{{ $k->nama_kelas }}</td>
                        <td class="p-3">{{ $k->kuota }}</td>
                        <td class="p-3">{{ $k->tahun_ajaran }}</td>
                        <td class="p-3">{{ $k->wali_kelas }}</td>

                        <td class="p-3 text-center">
                            <a href="{{ $mode === 'absen' ? route('guru.absensi.form', $k->id_kelas) : route('guru.rekap.tanggal', $k->id_kelas) }}" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-yellow-400 text-white rounded-lg shadow hover:opacity-90 transition">
                                {{ $mode === 'absen' ? 'Input Absensi' : 'Rekap Absensi' }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard-layout>