@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-2 h-full pt-32">
        <div class="flex flex-col items-start px-28 text-left text-2xl text-gray-600">
            <button id="button1">
                <div class="flex items-center gap-x-5 pb-4">
                    <div>
                        Manajemen Mahasiswa
                    </div>
                    <div class="w-4">
                        <img src="pictures/dropdown_grey.png" alt="">
                    </div>
                </div>
            </button>
            <div id="dropdown" class="hidden flex-col pl-10">
                <a href="" class="text-lg pb-4">
                    List Mahasiswa
                </a>
                <a href="" class="text-lg pb-4">
                    List Kelompok
                </a>
            </div>
            <a href="" class="pb-4">
                Manajemen Penilaian
            </a>
            <button id="button2">
                <div class="flex items-center gap-x-28 pb-4">
                    <div>
                        Nilai Mahasiswa
                    </div>
                    <div class="w-4">
                        <img src="pictures/dropdown_grey.png" alt="">
                    </div>
                </div>
            </button>
            <div id="dropdown2" class="hidden flex-col pl-10 text-lg">
                <a href="" class="pb-4">
                    Penyambutan
                </a>
                <a href="" class="pb-4">
                    Pembinaan
                </a>
                <a href="" class="pb-4">
                    Orientasi Ormawa
                </a>
            </div>
            <a href="" class="pb-4">
                Manajemen User
            </a>
            <a href="" class="pb-4">
                Manajemen Kegiatan
            </a>
        </div>
    <div>
        <img src="pictures/logo cerebrum.png" alt="logo cerebrum" class="scale-70">
    </div>

    <div class="px-28 font-light opacity-50">
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