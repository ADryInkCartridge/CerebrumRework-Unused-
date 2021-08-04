<html lang="en">
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

<body class="bg-backgroundCerebrum flex justify-center items-center">
    <div class="flex justify-between w-837 h-449 bg-white overflow-hidden rounded-3xl items-center shadow-2xl px-20 relative">
        
        <div class="absolute -left-24 w-96 -bottom-20">
                <img src="pictures/circle_login.png" alt="">
        </div>
        <!-- Card Login -->
        <div class="bg-white w-309 h-84 border-2 rounded-3xl border-backgroundCerebrum z-10">
            <div class="text-grayCerebrum text-2xl font-medium mt-14 mb-6 flex justify-center">
                Buku Hijau Cerebrum
            </div>
            <form action="">
                <div class="flex justify-center mb-6">
                    <input type="text" id="Username" name="Username" placeholder="Username" class="text-xs rounded-lg w-52 h-8">
                </div>
                <div class="flex justify-center mb-10">
                    <input type="password" id="Password" name="Password" placeholder="Password" class="text-xs rounded-lg w-52 h-8">
                </div>
                <div class="flex justify-center mt-2">
                    <button type="button" class="text-white text-xs bg-backgroundCerebrum w-24 h-7 rounded-full">Log In</button>
                </div>
            </form>
        </div>
        <div class="w-72 h-40">
            <img src="pictures/logo cerebrum.png" alt="logo cerebrum">
        </div>
    </div>
</body>
</html>