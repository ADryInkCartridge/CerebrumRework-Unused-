<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body id="body" class=" bg-backgroundCerebrum font-sans">
    <div class="flex flex-col">
        <nav class="bg-white rounded-b-xl">
            <div class="flex h-28 items-center px-10 gap-x-28">
                <img class="object-contain h-20" src="pictures/logo cerebrum.png" alt="">
                <a class="text-2xl nav-link text-tabletext" href="{{route('petunjuk')}}">Petunjuk Umum</a>
                <a class="text-2xl nav-link text-tabletext" href="/">Rapor Kaderisasi</a>
            </div>
        </nav>
        <div class="flex flex-col px-20">
            @yield('content')

        </div>
    </div>


</body>