<aside class="w-64 h-screen bg-[#1A1A1A] text-white p-6 sticky top-0">
    <h4 class="text-[18px] font-bold text-center">Sistem Informasi Absensi Siswa TK Azzaki</h4>
    <img src="/img/Icon.png" alt="TK Azzaki" class="w-[90px] h-[90px] object-contain mx-auto mb-10">

    <nav class="flex flex-col gap-4">
        <a href="/guru/dashboard" class="py-2 px-3 rounded hover:bg-gray-700 flex items-center gap-3">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.5L12 3l9 6.5V20a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1V9.5z" />
            </svg>
            Dashboard
        </a>

        <a href="/guru/siswa" class="py-2 px-3 rounded hover:bg-gray-700 flex items-center gap-3">
            <svg class="w-5 h-5 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 0 0-4-4h-1M9 20H4v-2a4 4 0 0 1 4-4h1m4-4a3 3 0 1 0-6 0 3 3 0 0 0 6 0z" />
            </svg>
            Data Siswa
        </a>

        <a href="/guru/absensi" class="py-2 px-3 rounded hover:bg-gray-700 flex items-center gap-3">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12M20 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6m16 0a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2" />
            </svg>
            Input Absensi
        </a>

        <a href="/guru/rekap" class="py-2 px-3 rounded hover:bg-gray-700 flex items-center gap-3">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6M3 7h18M9 3h6v4H9z" />
            </svg>
            Rekap Absensi
        </a>

        <form action="/logout" method="POST" class="mt-6">
            @csrf
            <button class="w-full text-left py-2 px-3 rounded hover:bg-red-600 flex items-center gap-3">
                <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1" />
                </svg>
                Logout
            </button>
        </form>
    </nav>
</aside>