<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/Icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/Icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/Icon.png">
    <link rel="manifest" href="/img/Icon.png">
    <title>TK Azzaki - Sistem Informasi Absensi Siswa</title>
    @vite('resources/css/app.css')
    <style>
        @keyframes firefly-move {
            0% { transform: translate(0, 0); }
            25% { transform: translate(100px, -50px); }
            50% { transform: translate(50px, 100px); }
            75% { transform: translate(-80px, 30px); }
            100% { transform: translate(0, 0); }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 10px rgba(255, 223, 0, 0.8), 0 0 20px rgba(255, 223, 0, 0.5);
                opacity: 1;
            }
            50% {
                box-shadow: 0 0 20px rgba(255, 223, 0, 1), 0 0 40px rgba(255, 223, 0, 0.8);
                opacity: 0.8;
            }
        }

        .firefly {
            position: absolute;
            width: 8px;
            height: 8px;
            background: #FFDF00;
            border-radius: 50%;
            pointer-events: none;
        }
    </style>
</head>

<body class="min-h-screen bg-white font-['Plus Jakarta Sans'] text-gray-800">
    <header class="w-full py-6 px-10 bg-white border-b border-gray-200 flex justify-between items-center sticky top-0 z-50 backdrop-blur-xl bg-white/80">
        <div class="flex items-center xl:gap-4">
            <img src="/img/Icon.png" alt="TK Azzaki Logo" class="w-10 h-10 xl:w-14 xl:h-14 xl:mb-2 object-contain">
            <h1 class="xl:text-2xl font-bold text-gray-900 tracking-tight">TK AZZAKI</h1>
        </div>

        <a href="/login" class="px-2 py-1 xl:px-6 xl:py-2 bg-gradient-to-r from-pink-500 to-yellow-400 text-white rounded-lg font-semibold shadow hover:opacity-90 transition">
            Login
        </a>
    </header>

    <section class="px-10 xl:py-32 xl:mb-10 py-[10px]">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="order-1 md:order-2 w-full h-64 xl:h-72 rounded-2xl bg-[url('/public/img/HeroSection.jpg')] bg-cover bg-center shadow-lg">
            </div>

            <div class="order-2 md:order-1 text-center md:text-left">
                <h2 class="text-3xl xl:text-5xl font-extrabold leading-tight mb-6">
                    "Masa kecil adalah taman tempat tumbuhnya mimpi."
                </h2>

                <p class="text-lg text-gray-600 max-w-md mx-auto md:mx-0 leading-relaxed">
                    Di TK Azzaki, setiap hari adalah kesempatan bagi anak-anak untuk bermain, belajar, dan berkembang dengan penuh keceriaan.
                </p>
            </div>
        </div>
    </section>

    <section class="relative px-10 py-16 bg-black border-t border-gray-200 overflow-hidden">
        <div class="firefly" style="animation: firefly-move 8s infinite ease-in-out, glow 2s infinite; left: 5%; top: 10%; animation-delay: 0s, 0s;"></div>
        <div class="firefly" style="animation: firefly-move 10s infinite ease-in-out, glow 2.5s infinite; right: 10%; top: 20%; animation-delay: 2s, 0.5s;"></div>
        <div class="firefly" style="animation: firefly-move 9s infinite ease-in-out, glow 2s infinite; left: 15%; bottom: 15%; animation-delay: 4s, 1s;"></div>
        <div class="firefly" style="animation: firefly-move 11s infinite ease-in-out, glow 2.2s infinite; right: 15%; bottom: 20%; animation-delay: 1s, 0.3s;"></div>
        <div class="firefly" style="animation: firefly-move 8.5s infinite ease-in-out, glow 2.3s infinite; left: 25%; top: 40%; animation-delay: 3s, 1.5s;"></div>
        <div class="firefly" style="animation: firefly-move 9.5s infinite ease-in-out, glow 2.1s infinite; right: 20%; top: 50%; animation-delay: 5s, 0.7s;"></div>

        <div class="max-w-4xl mx-auto text-center relative z-10">
            <h3 class="text-3xl font-bold text-white mb-6">Tentang</h3>
            <p class="text-white text-lg leading-relaxed">
                TK Azzaki adalah taman kanak-kanak yang fokus pada pembelajaran kreatif, karakter, dan kebahagiaan anak. Dengan lingkungan aman dan profesional, kami membantu anak mengembangkan potensi sejak dini.
            </p>
        </div>
    </section>

    <section class="px-10 py-20">
        <h3 class="text-3xl font-bold text-gray-900 mb-12 text-center">Guru</h3>

        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-6 text-center">
                <div class="w-28 h-28 mx-auto rounded-full border border-gray-200 bg-[url(/public/img/guru.jpg)] bg-cover bg-center mb-4"></div>
                <h4 class="text-lg font-semibold text-gray-900">Bu Anis</h4>
                <p class="text-sm text-gray-500">Guru Kelas A</p>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-6 text-center">
                <div class="w-28 h-28 mx-auto rounded-full border border-gray-200 bg-[url(/public/img/guru.jpg)] bg-cover bg-center mb-4"></div>
                <h4 class="text-lg font-semibold text-gray-900">Bu Wati</h4>
                <p class="text-sm text-gray-500">Guru Kelas B</p>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-6 text-center">
                <div class="w-28 h-28 mx-auto rounded-full border border-gray-200 bg-[url(/public/img/guru.jpg)] bg-cover bg-center mb-4"></div>
                <h4 class="text-lg font-semibold text-gray-900">Bu Sari</h4>
                <p class="text-sm text-gray-500">Guru Kelas C</p>
            </div>
        </div>
    </section>

    <section class="px-10 py-20 bg-gray-50 border-t border-gray-200">
        <h3 class="text-3xl font-bold text-gray-900 mb-12 text-center">Galeri Kegiatan</h3>

        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="w-full h-56 bg-gray-200 rounded-xl bg-[url(/public/img/Gallery1.jpg)] bg-cover bg-center"></div>
            <div class="w-full h-56 bg-gray-200 rounded-xl bg-[url(/public/img/Gallery2.jpg)] bg-cover bg-center"></div>
            <div class="w-full h-56 bg-gray-200 rounded-xl bg-[url(/public/img/Gallery3.jpg)] bg-cover bg-center"></div>
            <div class="w-full h-56 bg-gray-200 rounded-xl bg-[url(/public/img/Gallery4.jpg)] bg-cover bg-center"></div>
            <div class="w-full h-56 bg-gray-200 rounded-xl bg-[url(/public/img/Gallery5.jpg)] bg-cover bg-center"></div>
            <div class="w-full h-56 bg-gray-200 rounded-xl bg-[url(/public/img/Gallery6.jpg)] bg-cover bg-center"></div>
        </div>
    </section>

    <footer class="w-full p-12 bg-black border-t border-gray-800 mt-10 text-white relative overflow-hidden">
        <div class="firefly" style="animation: firefly-move 8s infinite ease-in-out, glow 2s infinite; left: 5%; top: 15%; animation-delay: 0s, 0s;"></div>
        <div class="firefly" style="animation: firefly-move 10s infinite ease-in-out, glow 2.5s infinite; right: 8%; top: 25%; animation-delay: 2s, 0.5s;"></div>
        <div class="firefly" style="animation: firefly-move 9s infinite ease-in-out, glow 2s infinite; left: 12%; bottom: 20%; animation-delay: 4s, 1s;"></div>
        <div class="firefly" style="animation: firefly-move 11s infinite ease-in-out, glow 2.2s infinite; right: 12%; bottom: 15%; animation-delay: 1s, 0.3s;"></div>
        <div class="firefly" style="animation: firefly-move 8.5s infinite ease-in-out, glow 2.3s infinite; left: 20%; top: 35%; animation-delay: 3s, 1.5s;"></div>
        <div class="firefly" style="animation: firefly-move 9.5s infinite ease-in-out, glow 2.1s infinite; right: 18%; top: 45%; animation-delay: 5s, 0.7s;"></div>

        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 relative z-10">
            <div>
                <h4 class="text-xl font-bold mb-3">Kontak</h4>

                <div class="flex items-center gap-3 mt-3">
                    <a href="https://instagram.com/azzaki" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="w-10 h-10 flex items-center justify-center rounded-full bg-gradient-to-tr from-pink-500 via-yellow-400 to-purple-600 hover:opacity-90">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M7 2h10a5 5 0 015 5v10a5 5 0 01-5 5H7a5 5 0 01-5-5V7a5 5 0 015-5zm5 6.5A4.5 4.5 0 1016.5 13 4.5 4.5 0 0012 8.5zm4.75-3.25a1.125 1.125 0 11-1.125-1.125A1.125 1.125 0 0116.75 5.25z" />
                        </svg>
                    </a>

                    <a href="mailto:azzakikawidaran@gmail.com" aria-label="Email" class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 hover:opacity-90">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                    </a>

                    <a href="https://wa.me/6283898348449" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp" class="w-10 h-10 flex items-center justify-center rounded-full bg-green-500 hover:opacity-90">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M20.52 3.478A11.948 11.948 0 0012 0C5.373 0 .001 5.373 .001 12.001a11.9 11.9 0 001.631 6.021L0 24l5.158-1.596A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-11.999 0-3.2-1.246-6.199-3.48-8.523zM12 21.5a9.42 9.42 0 01-5.166-1.567l-.37-.236-3.062.949.972-3.005-.24-.382A9.5 9.5 0 1121.5 12 9.47 9.47 0 0112 21.5zM17.1 14.06l-1.1.32a1.83 1.83 0 00-1.7-.96c-.45 0-.88.12-1.26.34a5.03 5.03 0 01-2.1-2.1c.22-.38.34-.82.34-1.26 0-.64-.25-1.25-.96-1.7l-.32-1.1A2.02 2.02 0 006.9 7.3c-1.12 0-2.03.91-2.03 2.03a9.1 9.1 0 0014.23 4.73 2.02 2.02 0 00-.0-0.0z" />
                        </svg>
                    </a>

                    <a href="https://facebook.com/azzaki" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-800 hover:opacity-90">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M22 12.07C22 6.48 17.52 2 11.93 2S2 6.48 2 12.07C2 17.08 5.66 21.2 10.44 22v-7.03H8.08v-2.9h2.36V9.41c0-2.33 1.38-3.61 3.5-3.61.99 0 2.02.18 2.02.18v2.22h-1.14c-1.12 0-1.47.7-1.47 1.42v1.7h2.5l-.4 2.9h-2.1V22C18.34 21.2 22 17.08 22 12.07z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-xl font-bold mb-6">Lokasi</h4>
                <p class="text-gray-300">Jalan Raya Serang No. 123, Kecamatan Cikupa, Kabupaten Tangerang, Provinsi — Banten</p>
            </div>
        </div>

        <p class="text-center mt-20 text-gray-500 text-sm relative z-10">© 2025 TK Azzaki. All rights reserved</p>
    </footer>
</body>
</html>