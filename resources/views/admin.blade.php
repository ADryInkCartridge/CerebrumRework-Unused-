@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-2 h-full pt-32">
    <div class="flex flex-col items-start px-28 text-left text-2xl text-gray-600">
        <button id="button1">
            <a href="{{route('listmahasiswa')}}">
                <div class="flex items-center gap-x-5 pb-4">
                    <div>
                        Manajemen Mahasiswa
                    </div>
                </div>
            </a>
        </button>

        <a href="{{route('listkegiatanpanitia')}}" class="pb-4">
            Manajemen Penilaian
        </a>
        <button id="button2">
            <div class="flex items-center gap-x-28 pb-4">
                <div>
                    Nilai Mahasiswa
                </div>
                <div class="w-4">
                    <img src="pictures/dropdown.png" alt="">
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
        <button id="listuser">
            <div class="flex items-center gap-x-28 pb-4">
                <div>
                    Manajemen User
                </div>
                <div class="w-4">
                    <img src="pictures/dropdown.png" alt="">
                </div>
            </div>
        </button>
        <div id="droplistuser" class="hidden flex-col pl-10 text-lg">
            <a href="{{route('listUser')}}" class="pb-4">
                List User
            </a>
            <a href="" class="pb-4">
                List Panitia
            </a>
            <a href="" class="pb-4">
                List Ormawa
            </a>
        </div>
        <button id="listkegiatan">
            <div class="flex items-center gap-x-28 pb-4">
                <div>
                    Kegiatan
                </div>
                <div class="w-4">
                    <img src="pictures/dropdown.png" alt="">
                </div>
            </div>
        </button>
        <div id="droplistkegiatan" class="hidden flex-col pl-10 text-lg">
            <a href="{{route('listtahap')}}" class="pb-4">
                Manajemen Kegiatan
            </a>
            <a href="{{route('listdivisi')}}" class="pb-4">
                List Divisi
            </a>
            <a href="{{route('listkegiatanpanitia')}}" class="pb-4">
                List Kegiatan
            </a>
        </div>
        <form action="{{route('logout.post')}}" method="POST">
            @csrf
            <div class="flex justify-center mt-2">
                <button type="submit"
                    class="text-white text-xs bg-backgroundCerebrum w-24 h-7 rounded-full">Logout</button>
            </div>
        </form>
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

<script>
        window.addEventListener('DOMContentLoaded', () => {
            const nilaibtn = document.querySelector('#listuser')
            const nilai = document.querySelector('#droplistuser')
            nilaibtn.addEventListener('click', () => {
                nilai.classList.toggle('hidden');
                nilai.classList.toggle('flex');
            })
        })
</script>

<script>
        window.addEventListener('DOMContentLoaded', () => {
            const nilaibtn = document.querySelector('#listkegiatan')
            const nilai = document.querySelector('#droplistkegiatan')
            nilaibtn.addEventListener('click', () => {
                nilai.classList.toggle('hidden');
                nilai.classList.toggle('flex');
            })
        })
</script>


@endsection('content')