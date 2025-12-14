<x-dashboard-layout title="Tambah Kelas">
    <h1 class="text-3xl font-bold mb-6">Tambah Kelas</h1>

    <div class="bg-white p-6 rounded-xl shadow border border-gray-200 max-w-xl">
        <form action="{{ route('admin.kelas.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="font-medium">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="w-full mt-1 px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="font-medium">Kuota</label>
                <input type="number" name="kuota" class="w-full mt-1 px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="font-medium">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="w-full mt-1 px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="font-medium">Wali Kelas</label>
                <input type="text" name="wali_kelas" class="w-full mt-1 px-4 py-2 border rounded-lg" required>
            </div>

            <button class="px-6 py-2 bg-gradient-to-r from-pink-500 to-yellow-400 text-white rounded-lg shadow hover:opacity-90">
                Simpan
            </button>
        </form>
    </div>
</x-dashboard-layout>