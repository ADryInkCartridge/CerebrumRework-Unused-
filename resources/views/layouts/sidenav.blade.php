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
    @if(Auth::user()->role == 'Super User')
    <div class="flex gap-x-5 ">
        <div
            class="flex flex-col w-64 text-backgroundCerebrum bg-white m-4 sidenavheight items-center rounded-3xl p-4 fixed">
            <div class="flex text-xl font-semibold pb-10">
                Buku Hijau Cerebrum
            </div>
            <div class="flex w-full justify-center items-center gap-x-5 pb-10">
                <img class="w-20 h-20" src="pictures/fotoadmin.png" alt="">
                <div class="flex flex-col items-start">
                    <span class="font-semibold">{{{Auth::user()->nama}}}</span>
                    <span>Superuser</span>
                </div>
            </div>
            <nav class="= flex-1 flex flex-col text-backgroundCerebrum items-start gap-y-4 text-sm">
                <button id="manajemen" class="flex items-center justify-between w-full gap-x-3">
                    <div class="flex gap-x-3">
                        <img src="pictures/iconmahasiswa.png" class="w-5" alt="">
                        Manajemen Mahasiswa
                    </div>

                    <img src="pictures/dropdown.png" class="w-2" alt="">
                </button>
                <div id="dropmanajemen" class="hidden flex-col pl-8 gap-y-2">
                    <a href="{{route('listmahasiswa')}}">List Mahasiswa</a>
                    <a href="">List Kelompok</a>
                </div>
                <div class="flex gap-x-3"><img class="w-5" src="pictures/iconmanajemennilai.png" alt=""><a class=""
                        href="">Manajemen Penilaian</a></div>

                <button id="nilai" class="flex items-center justify-between  w-full gap-x-3">
                    <div class="flex gap-x-3">
                        <img src="pictures/iconnilai.png" class="w-5" alt="">
                        Nilai Mahasiswa
                    </div>

                    <img src="pictures/dropdown.png" class="w-2 end" alt="">

                </button>
                <div id="dropnilai" class="hidden flex-col pl-8 gap-y-2">
                    <a href="">Penyambutan</a>
                    <a href="">Pembinaan</a>
                    <a href="">Orientasi Ormawa</a>
                </div>
                <div class="flex gap-x-3"><img class="w-5" src="pictures/iconmanajemenuser.png" alt=""><a class=""
                        href="{{route('listUser')}}">Manajemen User</a></div>
                <div class="flex gap-x-3"><img class="w-5" src="pictures/iconkegiatan.png" alt=""><a class=""
                        href="">Kegiatan</a></div>
            </nav>

            <form action="{{route('logout.post')}}" method="POST">
                @csrf
                <div class="flex justify-center mt-2">
                    <button type="submit"
                        class="text-white text-xs bg-backgroundCerebrum w-24 h-7 rounded-full">Logout</button>
                </div>
            </form>
        </div>
        <div class="ml-64 pl-4 flex-1">
            @yield('content')
        </div>
    </div>


    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const manabtn = document.querySelector('#manajemen')
            const mana = document.querySelector('#dropmanajemen')
            const nilaibtn = document.querySelector('#nilai')
            const nilai = document.querySelector('#dropnilai')
            manabtn.addEventListener('click', () => {
                mana.classList.toggle('hidden');
                mana.classList.toggle('flex');
            })
            nilaibtn.addEventListener('click', () => {
                nilai.classList.toggle('hidden');
                nilai.classList.toggle('flex');
            })
        })
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const editbtn = document.getElementsByClassName('editbtn')
            const edit = document.getElementsByClassName('editdropdown')
            const editclose = document.getElementsByClassName('closeedit')
            const tambahbtn = document.querySelector('#tambahbtn')
            const tambahoverlay = document.querySelector('#tambahoverlay')
            const closeoverlay = document.querySelector('#closeoverlaybtn')
            const uploadbtn = document.querySelector('#uploadbtn')
            const uploadoverlay = document.querySelector('#uploadoverlay')
            const closeuploadoverlay = document.querySelector('#closeuploadoverlaybtn')
            const body = document.querySelector('#body')
            for (let i = 0; i < editbtn.length; i++) {
                editbtn[i].onclick = function () {
                    edit[i].style.display = "block";
                }
            }
            for (let i = 0; i < editclose.length; i++) {
                editclose[i].onclick = function () {
                    edit[i].style.display = "none";
                }
            }
            editbtn.addEventListener('click', () => {
                edit.classList.toggle('hidden');
                edit.classList.toggle('flex');
            })
            editclose.addEventListener('click', () => {
                edit.classList.toggle('hidden');
                edit.classList.toggle('flex');
            })
            tambahbtn.addEventListener('click', () => {
                tambahoverlay.classList.toggle('hidden');
                tambahoverlay.classList.toggle('flex');
                body.classList.toggle('overflow-hidden');
            })
            closeoverlay.addEventListener('click', () => {
                tambahoverlay.classList.toggle('hidden');
                tambahoverlay.classList.toggle('flex');
                body.classList.remove('overflow-hidden');

            })
            uploadbtn.addEventListener('click', () => {
                uploadoverlay.classList.toggle('hidden');
                uploadoverlay.classList.toggle('flex');
            })
            closeuploadoverlay.addEventListener('click', () => {
                uploadoverlay.classList.toggle('hidden');
                uploadoverlay.classList.toggle('flex');

            })
        })
    </script>
    @elseif(Auth::user()->role == 'Ormawa')
    <div class="flex gap-x-5 ">
        <div class="flex flex-col w-64 text-backgroundCerebrum bg-white m-4 sidenavheight items-center rounded-3xl p-4">
            <div class="flex text-xl font-semibold pb-10">
                Buku Hijau Cerebrum
            </div>
            <div class="flex w-full justify-center items-center gap-x-5 pb-10">
                <img class="w-20 h-20" src="pictures/fotoadmin.png" alt="">
                <div class="flex flex-col items-start">
                    <span class="font-semibold">SKP</span>
                    <span>Ormawa</span>
                </div>
            </div>

            <!-- Navbar -->
            <nav class="= flex-1 flex flex-col text-backgroundCerebrum items-start gap-y-4 text-sm pr-10">
                <div class="flex gap-x-3"><img class="w-5" src="pictures/iconkegiatan.png" alt=""><a class=""
                        href="">Kegiatan Ormawa</a></div>

                <div class="flex gap-x-3"><img class="w-5" src="pictures/iconnilai.png" alt=""><a class=""
                        href="">Penilaian</a></div>

            </nav>
            <div class="flex items-center justify-start w-full px-4 gap-x-5">
                <img src="pictures/logout_gray.png" class="w-10" alt="">
                Log Out
            </div>
        </div>
        <div class="w-full flex-1">
            @yield('content')
        </div>
    </div>


    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const manabtn = document.querySelector('#manajemen')
            const mana = document.querySelector('#dropmanajemen')
            const nilaibtn = document.querySelector('#nilai')
            const nilai = document.querySelector('#dropnilai')
            manabtn.addEventListener('click', () => {
                mana.classList.toggle('hidden');
                mana.classList.toggle('flex');

            })
            nilaibtn.addEventListener('click', () => {
                nilai.classList.toggle('hidden');
                nilai.classList.toggle('flex');

            })

        })
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const editbtn = document.getElementsByClassName('editbtn')
            const edit = document.getElementsByClassName('editdropdown')
            const editclose = document.getElementsByClassName('closeedit')
            const tambahbtn = document.querySelector('#tambahbtn')
            const tambahoverlay = document.querySelector('#tambahoverlay')
            const closeoverlay = document.querySelector('#closeoverlaybtn')
            const uploadbtn = document.querySelector('#uploadbtn')
            const uploadoverlay = document.querySelector('#uploadoverlay')
            const closeuploadoverlay = document.querySelector('#closeuploadoverlaybtn')
            const body = document.querySelector('#body')
            for (let i = 0; i < editbtn.length; i++) {
                editbtn[i].onclick = function () {
                    edit[i].style.display = "block";
                }
            }
            for (let i = 0; i < editclose.length; i++) {
                editclose[i].onclick = function () {
                    edit[i].style.display = "none";
                }
            }
            editbtn.addEventListener('click', () => {
                edit.classList.toggle('hidden');
                edit.classList.toggle('flex');
            })
            editclose.addEventListener('click', () => {
                edit.classList.toggle('hidden');
                edit.classList.toggle('flex');
            })
            tambahbtn.addEventListener('click', () => {
                tambahoverlay.classList.toggle('hidden');
                tambahoverlay.classList.toggle('flex');
                body.classList.toggle('overflow-hidden');
            })
            closeoverlay.addEventListener('click', () => {
                tambahoverlay.classList.toggle('hidden');
                tambahoverlay.classList.toggle('flex');
                body.classList.remove('overflow-hidden');

            })
            uploadbtn.addEventListener('click', () => {
                uploadoverlay.classList.toggle('hidden');
                uploadoverlay.classList.toggle('flex');
            })
            closeuploadoverlay.addEventListener('click', () => {
                uploadoverlay.classList.toggle('hidden');
                uploadoverlay.classList.toggle('flex');

            })
        })
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
    @endif
</body>