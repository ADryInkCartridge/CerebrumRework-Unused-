@extends('layouts.ormawa')

@section('content')
<div class="grid grid-cols-2 h-full pt-32">
        <div class="flex flex-col items-start px-28 text-left text-2xl text-gray-600">
            <a href="" class="pb-4">
                Kegiatan Ormawa
            </a>
            <a href="" class="pb-4">
                Nilai Mahasiswa
            </a>
        </div>
    <div>
        <img src="pictures/logo cerebrum.png" alt="logo cerebrum" class="scale-70">
    </div>
    <div class="text-base opacity-30 px-28">
        Bontang Hebat 2021. All Rights Reserved
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const adminbtn = document.querySelector('#button1')
        const unesco = document.querySelector('#dropdown')
        console.log(unesco)
        adminbtn.addEventListener('click', () => {
            if (unesco.classList.contains('hidden')) {
                unesco.classList.remove('hidden');
                unesco.classList.add('flex');
            } else {
                unesco.classList.remove('flex');
                unesco.classList.add('hidden');
            }
        })

    })

    window.addEventListener('DOMContentLoaded', () => {
        const adminbtn = document.querySelector('#button2')
        const unesco = document.querySelector('#dropdown2')
        console.log(unesco)
        adminbtn.addEventListener('click', () => {
            if (unesco.classList.contains('hidden')) {
                unesco.classList.remove('hidden');
                unesco.classList.add('flex');
            } else {
                unesco.classList.remove('flex');
                unesco.classList.add('hidden');
            }
        })

    })
</script>
@endsection('content')