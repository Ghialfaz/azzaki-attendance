<x-dashboard-layout title="Data Siswa">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold">Daftar Siswa</h1>

        <a href="{{ route('guru.dashboard') }}" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-yellow-400 text-white rounded-lg shadow hover:opacity-90 transition">
            ← Kembali
        </a>
    </div>

    <p class="mb-6 text-gray-600">
        Jumlah siswa: <span class="font-semibold text-gray-900">{{ $siswa->count() }}</span>
    </p>

    <div class="bg-white p-6 rounded-xl shadow border border-gray-200">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 font-medium text-gray-700">Nama</th>
                    <th class="p-3 font-medium text-gray-700">Kelas</th>
                    <th class="p-3 font-medium text-gray-700">Jenis Kelamin</th>
                    <th class="p-3 font-medium text-gray-700">Tanggal Lahir</th>
                    <th class="p-3 font-medium text-gray-700">Orang Tua</th>
                    <th class="p-3 font-medium text-gray-700">Alamat</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($siswa as $s)
                    <tr class="border-b">
                        <td class="p-3">{{ $s->nama }}</td>

                        <td class="p-3">
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-sm">
                                {{ $s->kelas->nama_kelas ?? '-' }}
                            </span>
                        </td>

                        <td class="p-3">
                            @if ($s->jenis_kelamin === 'L')
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-sm">
                                    Laki-laki
                                </span>
                            @elseif ($s->jenis_kelamin === 'P')
                                <span class="px-2 py-1 bg-pink-100 text-pink-700 rounded text-sm">
                                    Perempuan
                                </span>
                            @else
                                <span class="text-gray-500">-</span>
                            @endif
                        </td>

                        <td class="p-3">
                            {{ $s->tanggal_lahir ? date('d M Y', strtotime($s->tanggal_lahir)) : '-' }}
                        </td>

                        <td class="p-3">{{ $s->nama_orangtua ?? '-' }}</td>

                        <td class="p-3">{{ $s->alamat ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">
                            Tidak ada data siswa ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-dashboard-layout>