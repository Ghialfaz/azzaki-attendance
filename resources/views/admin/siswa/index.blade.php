<x-dashboard-layout title="Kelola Data Siswa">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold">Kelola Semua Data Siswa</h1>

        <a href="{{ route('admin.siswa.create') }}" class="px-4 py-2 inline-block bg-gradient-to-r from-pink-500 to-yellow-400 text-white rounded-lg shadow hover:opacity-90 transition">
            + Tambah Siswa
        </a>
    </div>

    <div class="bg-white p-6 rounded-xl shadow border border-gray-200">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 font-medium text-gray-700">Nama Siswa</th>
                    <th class="p-3 font-medium text-gray-700">Kelas</th>
                    <th class="p-3 font-medium text-gray-700">Jenis Kelamin</th>
                    <th class="p-3 font-medium text-gray-700">Tanggal Lahir</th>
                    <th class="p-3 font-medium text-gray-700">Orang Tua</th>
                    <th class="p-3 font-medium text-gray-700">Alamat</th>
                    <th class="p-3 font-medium text-gray-700 text-center">Aksi</th>
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
                            @else
                                <span class="px-2 py-1 bg-pink-100 text-pink-700 rounded text-sm">
                                    Perempuan
                                </span>
                            @endif
                        </td>

                        <td class="p-3">
                            {{ $s->tanggal_lahir ? date('d M Y', strtotime($s->tanggal_lahir)) : '-' }}
                        </td>

                        <td class="p-3">{{ $s->nama_orangtua ?? '-' }}</td>

                        <td class="p-3">{{ $s->alamat ?? '-' }}</td>

                        <td class="p-3 flex gap-2 justify-center">
                            <a href="{{ route('admin.siswa.edit', $s->id_siswa) }}" class="px-3 py-2 bg-blue-500/20 text-blue-700 border border-blue-300 rounded-lg hover:bg-blue-500/30 hover:border-blue-400 transition text-sm font-medium">
                                Edit
                            </a>

                            <form action="{{ route('admin.siswa.destroy', $s->id_siswa) }}" method="POST" onsubmit="return confirm('Hapus siswa ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="px-3 py-2 bg-red-500/20 text-red-700 border border-red-300 rounded-lg hover:bg-red-500/30 hover:border-red-400 transition text-sm font-medium">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">
                            Belum ada data siswa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-dashboard-layout>