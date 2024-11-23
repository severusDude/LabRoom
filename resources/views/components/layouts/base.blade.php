<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- icons --}}
    <script src="https://cdn.jsdelivr.net/npm/heroicons@1.0.0/umd/heroicons.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <main class="min-h-screen bg-gray-100">
        <livewire:components.navigation />
        {{-- <x-livewire:sidebar>
            <x-livewire:sidebar-item :icon="'heroicon-o-home'" text="Home" :active="request()->routeIs('user.home')" />
            <x-livewire:sidebar-item :icon="'heroicon-o-cog'" text="Settings" />
        </x-livewire:sidebar> --}}
        <div class="ml-[314px]">
            <div class="px-4 py-8">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>

</html>
