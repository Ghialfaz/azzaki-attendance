<x-dashboard-layout title="Tambah Siswa">
    <h1 class="text-3xl font-bold mb-6">Tambah Siswa</h1>

    <div class="bg-white p-6 rounded-xl shadow border border-gray-200 max-w-2xl">
        <form action="{{ route('admin.siswa.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="font-medium block mb-1">Pilih Kelas</label>
                <select name="id_kelas" required class="w-full mt-1 px-4 py-2 border rounded-lg">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id_kelas }}" {{ old('id_kelas') == $k->id_kelas ? 'selected' : '' }}>
                            {{ $k->nama_kelas }} {{ $k->tahun_ajaran ? "({$k->tahun_ajaran})" : '' }}
                        </option>
                    @endforeach
                </select>
                @error('id_kelas')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="font-medium block mb-1">Nama Siswa</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="w-full mt-1 px-4 py-2 border rounded-lg" required>
                @error('nama')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="font-medium block mb-1">Nama Orang Tua (opsional)</label>
                <input type="text" name="nama_orangtua" value="{{ old('nama_orangtua') }}" class="w-full mt-1 px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="font-medium block mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full mt-1 px-4 py-2 border rounded-lg">
                        <option value="">Pilih</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="font-medium block mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full mt-1 px-4 py-2 border rounded-lg">
                </div>
            </div>

            <div class="mb-6">
                <label class="font-medium block mb-1">Alamat</label>
                <textarea name="alamat" rows="3" class="w-full mt-1 px-4 py-2 border rounded-lg">{{ old('alamat') }}</textarea>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('admin.siswa.index') }}" class="px-4 py-2 border rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
                <button class="px-6 py-2 bg-gradient-to-r from-pink-500 to-yellow-400 text-white rounded-lg shadow hover:opacity-90 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-dashboard-layout>