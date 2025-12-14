<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/Icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/Icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/Icon.png">
    <link rel="manifest" href="/img/Icon.png">
    <title>Login - Sistem Absensi TK Azzaki</title>
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

<body class="min-h-screen bg-black font-['Plus Jakarta Sans'] flex items-center justify-center p-6 relative overflow-hidden">
    <div class="firefly" style="animation: firefly-move 8s infinite ease-in-out, glow 2s infinite; left: 10%; top: 20%; animation-delay: 0s, 0s;"></div>
    <div class="firefly" style="animation: firefly-move 10s infinite ease-in-out, glow 2.5s infinite; right: 15%; top: 30%; animation-delay: 2s, 0.5s;"></div>
    <div class="firefly" style="animation: firefly-move 9s infinite ease-in-out, glow 2s infinite; left: 20%; bottom: 25%; animation-delay: 4s, 1s;"></div>
    <div class="firefly" style="animation: firefly-move 11s infinite ease-in-out, glow 2.2s infinite; right: 20%; bottom: 20%; animation-delay: 1s, 0.3s;"></div>
    <div class="firefly" style="animation: firefly-move 8.5s infinite ease-in-out, glow 2.3s infinite; left: 30%; top: 40%; animation-delay: 3s, 1.5s;"></div>
    <div class="firefly" style="animation: firefly-move 9.5s infinite ease-in-out, glow 2.1s infinite; right: 25%; top: 50%; animation-delay: 5s, 0.7s;"></div>
    <div class="firefly" style="animation: firefly-move 10.5s infinite ease-in-out, glow 2.4s infinite; left: 15%; top: 60%; animation-delay: 2.5s, 1.2s;"></div>
    <div class="firefly" style="animation: firefly-move 8.8s infinite ease-in-out, glow 2s infinite; right: 10%; bottom: 30%; animation-delay: 4.5s, 0s;"></div>

    <div class="w-full max-w-md bg-white border border-gray-200 shadow-xl rounded-2xl p-8 relative z-10">
        <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-8">Login</h2>

        @if ($errors->has('login'))
            <p class="text-red-500 text-center mb-4 bg-red-100 py-2 rounded-lg">
                {{ $errors->first('login') }}
            </p>
        @endif

        <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-medium mb-1 text-gray-700">Username</label>
                <input type="text" name="username" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" placeholder="Masukkan username" required>
            </div>

            <div>
                <label class="block font-medium mb-1 text-gray-700">Password</label>
                <input type="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none" placeholder="Masukkan password" required>
            </div>

            <div>
                <label class="block font-medium mb-1 text-gray-700">Role</label>
                <select name="role" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none bg-white">
                    <option value="admin">Admin</option>
                    <option value="guru">Guru</option>
                </select>
            </div>

            <button class="w-full py-3 bg-gradient-to-r from-pink-500 to-yellow-400 text-white font-semibold rounded-lg shadow hover:opacity-90 transition">
                Login
            </button>
        </form>
    </div>
</body>
</html>