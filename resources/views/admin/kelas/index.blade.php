<x-dashboard-layout title="Kelola Data Kelas">
    <h1 class="text-3xl font-bold mb-6">Kelola Data Kelas</h1>

    <a href="{{ route('admin.kelas.create') }}" class="px-4 py-2 mb-6 inline-block bg-gradient-to-r from-pink-500 to-yellow-400 text-white rounded-lg shadow hover:opacity-90 transition">
        + Tambah Kelas
    </a>

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
                @forelse ($kelas as $k)
                    <tr class="border-b">
                        <td class="p-3">
                            <a href="{{ route('admin.kelas.siswa', $k->id_kelas) }}" class="text-blue-600 hover:underline">
                                {{ $k->nama_kelas }}
                            </a>
                        </td>
                        <td class="p-3">{{ $k->kuota }}</td>
                        <td class="p-3">{{ $k->tahun_ajaran }}</td>
                        <td class="p-3">{{ $k->wali_kelas }}</td>
                        <td class="p-3 flex gap-2 justify-center">
                            <a href="{{ route('admin.kelas.edit', $k->id_kelas) }}" class="px-3 py-2 bg-blue-500/20 text-blue-600 border border-blue-300 rounded-lg hover:bg-blue-500/30 hover:border-blue-400 transition text-sm font-medium">
                                Edit
                            </a>

                            <form action="{{ route('admin.kelas.delete', $k->id_kelas) }}" method="POST" onsubmit="return confirm('Hapus kelas ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="px-3 py-2 bg-red-500/20 text-red-600 border border-red-300 rounded-lg hover:bg-red-500/30 hover:border-red-400 transition text-sm font-medium">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">
                            Belum ada data kelas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-dashboard-layout>