<x-dashboard-layout title="Dashboard Guru">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="p-6 rounded-xl shadow bg-yellow-100 border border-yellow-200">
            <div class="flex items-center justify-between mb-3">
                <h2 class="font-semibold text-lg text-yellow-800">Jumlah Kelas</h2>

                <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
            </div>

            <p class="text-4xl font-bold text-yellow-900">{{ $jumlah_kelas }}</p>

            <a href="{{ route('guru.kelas', ['mode' => 'absen']) }}" class="text-sm text-yellow-700 font-medium underline mt-3 inline-block">
                Lihat detail »
            </a>
        </div>

        <div class="p-6 rounded-xl shadow bg-sky-100 border border-sky-200">
            <div class="flex items-center justify-between mb-3">
                <h2 class="font-semibold text-lg text-sky-800">Jumlah Siswa</h2>

                <svg class="w-10 h-10 text-sky-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z" />
                </svg>
            </div>

            <p class="text-4xl font-bold text-sky-900">{{ $jumlah_siswa }}</p>

            <a href="{{ route('guru.siswa.index') }}" class="text-sm text-sky-700 font-medium underline mt-3 inline-block">
                Lihat detail »
            </a>
        </div>

        <div class="p-6 rounded-xl shadow bg-green-100 border border-green-200">
            <div class="flex items-center justify-between mb-3">
                <h2 class="font-semibold text-lg text-green-800">Jumlah Kehadiran</h2>

                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <p class="text-4xl font-bold text-green-900">{{ $jumlah_hadir }}</p>

            <a href="{{ route('guru.kelas', ['mode' => 'rekap']) }}" class="text-sm text-green-700 font-medium underline mt-3 inline-block">
                Lihat detail »
            </a>
        </div>

        <div class="p-6 rounded-xl shadow bg-red-100 border border-red-200">
            <div class="flex items-center justify-between mb-3">
                <h2 class="font-semibold text-lg text-red-800">Jumlah Ketidakhadiran</h2>

                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <p class="text-4xl font-bold text-red-900">{{ $jumlah_tidak_hadir }}</p>

            <a href="{{ route('guru.kelas', ['mode' => 'rekap']) }}" class="text-sm text-red-700 font-medium underline mt-3 inline-block">
                Lihat detail »
            </a>
        </div>
    </div>
</x-dashboard-layout>