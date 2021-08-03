<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="min-h-screen bg-backgroundCerebrum">
    <div class="w-full h-20 flex justify-between px-10 py-5 items-center">
        <div class="w-10 h-10">
            <img src="pictures/logo_unair.png" alt="Logo Unair <3">
        </div>
        <div class="text-center text-xl text-white">
            Buku Hijau Cerebrum
        </div>
    </div>
    <div class="w-full bottom-0 mt-12 grid grid-cols-1 text-white text-center text-xl align-text-bottom font-semibold">
        <div>
            Admin
        </div>
        <div class="text-orangeCerebrum text-sm">
            Super user
        </div>
    </div>
    <div class="left-0 right-0 mx-auto h-full rounded-t-2big bottom-0 bg-white z-10 absolute top-48">
        @yield('content')
    </div>
</body>