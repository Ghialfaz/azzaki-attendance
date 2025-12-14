<x-dashboard-layout title="Dashboard Admin">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl shadow bg-pink-100 border border-pink-200">
            <div class="flex items-center justify-between mb-3">
                <h2 class="font-semibold text-lg text-pink-800">Jumlah User</h2>

                <svg class="w-10 h-10 text-pink-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
            </div>

            <p class="text-4xl font-bold text-pink-900">{{ $jumlah_users }}</p>

            <a href="#" class="text-sm text-pink-700 font-medium underline mt-3 inline-block">
                Lihat detail »
            </a>
        </div>

        <div class="p-6 rounded-xl shadow bg-yellow-100 border border-yellow-200">
            <div class="flex items-center justify-between mb-3">
                <h2 class="font-semibold text-lg text-yellow-800">Jumlah Kelas</h2>

                <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
            </div>

            <p class="text-4xl font-bold text-yellow-900">{{ $jumlah_kelas }}</p>

            <a href="{{ route('admin.kelas.index') }}" class="text-sm text-yellow-700 font-medium underline mt-3 inline-block">
                Lihat detail »
            </a>
        </div>

        <div class="p-6 rounded-xl shadow bg-blue-100 border border-blue-200">
            <div class="flex items-center justify-between mb-3">
                <h2 class="font-semibold text-lg text-blue-800">Jumlah Siswa</h2>

                <svg class="w-10 h-10 text-sky-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z" />
                </svg>
            </div>

            <p class="text-4xl font-bold text-blue-900">{{ $jumlah_siswa }}</p>

            <a href="{{ route('admin.siswa.index') }}" class="text-sm text-blue-700 font-medium underline mt-3 inline-block">
                Lihat detail »
            </a>
        </div>
    </div>
</x-dashboard-layout>