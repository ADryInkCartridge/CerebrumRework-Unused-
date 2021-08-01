@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-2 h-full content-center">
    <div class="">
        <div class="flex flex-col items-start px-40 py-40 text-left text-2xl">
            <button id="button1">
                <div class="grid grid-cols-2 align-middle items-start">
                    <div>
                        Manajemen Mahasiswa
                    </div>
                    <div class="px-5">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                        </svg>
                    </div>
                </div>
            </button>
            <div id="dropdown" class="hidden flex-col  px-20">
                <a href="">
                    List Mahasiswa
                </a>
                <a href="">
                    List Kelompok
                </a>
            </div>
            <a href="#">
                Manajemen Penilaian
            </a>
            <button id="button2">
                <div class="grid grid-cols-2 align-middle items-start">
                    <div>
                        Nilai Mahasiswa
                    </div>
                    <div class="px-5">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                        </svg>
                    </div>
                </div>
            </button>
            <div id="dropdown2" class="hidden flex-col px-20">
                <a href="">
                    Penyambutan
                </a>
                <a href="">
                    Pembinaan
                </a>
                <a href="">
                    Orientasi Ormawa
                </a>
            </div>
            <a href="#">
                Manajemen User
            </a>
            <a href="#">
                Manajemen Kegiatan
            </a>
        </div>
    </div>
    <div class="items-center flex">
        <img src="pictures/logo cerebrum.png" alt="logo cerebrum" class="scale-70">
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