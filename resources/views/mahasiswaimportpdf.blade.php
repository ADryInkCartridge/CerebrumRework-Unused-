<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Petunjuk Umum</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="flex justify-center bg-backgroundCerebrum">
    <div class="w-3/6 pt-48">
        <div class="bg-white border-2 border-black rounded-2xl py-10 flex flex-col">
            <div class="flex justify-end pr-10">
                <a href="{{route('admin')}}">
                    <img class="w-4" src="/pictures/close.png" alt="">
                </a>
            </div>
            <h2 class="mb-6 text-4xl font-medium flex justify-start pl-16">
                Upload File Petunjuk Umum
            </h2>
            @if($errors->any())
            <h4>Error</h4>
            @endif
            @include('flash-message')
            <div class="flex justify-start pl-16 items-center pb-10">
                <form class="w-2/5" action="{{route('petunjuk.post')}}" method="POSt" enctype="multipart/form-data">
                    @csrf
                    <div class=" w-96 h-10 border-2">
                        <input placeholder="Test" class="bg-white text-base" type="file" name="file" id="customFile">
                    </div>
                    <div class="flex flex-row pt-10">
                        <button class="w-32 h-10 bg-greenTable1 rounded-lg flex justify-center items-center">
                            <div class="btn btn-primary text-sm">Upload</div>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>
