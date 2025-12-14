<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/Icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/Icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/Icon.png">
    <link rel="manifest" href="/img/Icon.png">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F7F8FA] font-['Plus Jakarta Sans']">
    <div class="flex">
        @if (session('role') === 'admin')
            @include('layouts.sidebar-admin')
        @else
            @include('layouts.sidebar-guru')
        @endif

        <main class="flex-1 p-8">
            {{ $slot }}
        </main>
    </div>
</body>
</html>