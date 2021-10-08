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
    @if(!Auth::check())
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

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>

    <body class=" bg-backgroundCerebrum font-sans">
        @yield('content')
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
    </body>
    @elseif(Auth::user()->role == 'Super User')
    <div class="flex gap-x-5 ">
        <div
            class="flex flex-col w-64 text-backgroundCerebrum bg-white m-4 sidenavheight items-center rounded-3xl p-4 fixed">
            <div class="flex text-xl font-semibold pb-10">
                Buku Hijau Cerebrum
            </div>
            <div class="flex w-full justify-center items-center gap-x-5 pb-10">
                <img class="w-20 h-20" src="/pictures/fotoadmin.png" alt="">
                <div class="flex flex-col items-start">
                    <span class="font-semibold">{{{Auth::user()->nama}}}</span>
                    <span>Superuser</span>
                </div>
            </div>
            <nav class="= flex-1 flex flex-col text-backgroundCerebrum items-start gap-y-4 text-sm">
                <button id="manajemen" class="flex items-center justify-between w-full gap-x-3">
                    <div class="flex gap-x-3">
                        <img src="/pictures/iconmahasiswa.png" class="w-5" alt="">
                        <a href="{{route('listmahasiswa')}}">
                            Manajemen Mahasiswa
                        </a>
                    </div>
                </button>


                <button id="listuser" class="flex items-center justify-between w-full">
                    <div class="flex gap-x-3">
                        <img src="/pictures/iconmanajemenuser.png" class="w-5" alt="">
                        Manajemen User
                    </div>
                    <img src="/pictures/dropdown.png" class="w-2 end" alt="">
                </button>
                <div id="droplistuser" class="hidden flex-col pl-8 gap-y-2">
                    <a href="{{route('listUser')}}">List User</a>
                    <a href="{{route('listpanitia')}}">List Panitia</a>
                    <a href="{{route('listormawa')}}">List Ormawa</a>
                </div>


                <button id="listkegiatan" class="flex items-center justify-between w-full gap-x-3">
                    <div class="flex gap-x-3">
                        <img src="/pictures/iconkegiatan.png" class="w-5" alt="">
                        Kegiatan
                    </div>
                    <img src="/pictures/dropdown.png" class="w-2 end" alt="">
                </button>
                <div id="droplistkegiatan" class="hidden flex-col pl-8 gap-y-2">
                    <a href="{{route('listtahap')}}">Manajemen Kegiatan</a>
                    <a href="{{route('listdivisi')}}">List Divisi</a>
                    <a href="{{route('listkegiatanpanitia')}}">List Kegiatan</a>
                </div>
            </nav>


            <a class="flex justify-center items-center text-white bg-backgroundCerebrum w-24 h-7 rounded-full text-xs"
                href="{{route('admin')}}">
                Home
            </a>



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
        <div
            class="flex flex-col w-64 text-backgroundCerebrum bg-white m-4 sidenavheight items-center rounded-3xl p-4 fixed">
            <div class="flex text-xl font-semibold pb-10">
                Buku Hijau Cerebrum
            </div>
            <div class="flex w-full justify-center items-center gap-x-5 pb-10">
                <img class="w-20 h-20" src="/pictures/fotoadmin.png" alt="">
                <div class="flex flex-col items-start">
                    <span class="font-semibold">{{{Auth::user()->nama}}}</span>
                    <span>Ormawa</span>
                </div>
            </div>

            <!-- Navbar -->
            <nav class="= flex-1 flex flex-col text-backgroundCerebrum items-start gap-y-4 text-sm pr-10">
                <div class="flex gap-x-3"><img class="w-5" src="/pictures/iconkegiatan.png" alt=""><a class=""
                        href="{{route('listkegiatan')}}">Kegiatan Ormawa</a></div>

                <div class="flex gap-x-3"><img class="w-5" src="/pictures/user many_grey 3.png" alt=""><a class=""
                        href="{{route('listmhsormawa')}}">Alokasi Mahasiswa</a></div>

            </nav>

            <a class="flex justify-center items-center text-white bg-backgroundCerebrum w-24 h-7 rounded-full text-xs"
                href="{{route('admin')}}">
                Home
            </a>

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
        $(document).ready(function () {
            $('.select2').select2();
        });

    </script>
    @elseif(Auth::user()->role == 'Panitia')
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

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>

    <body class=" bg-backgroundCerebrum font-sans">
        <div class="flex gap-x-5 ">
            <div
                class="flex flex-col w-64 text-backgroundCerebrum bg-white m-4 sidenavheight items-center rounded-3xl p-4 fixed">
                <div class="flex text-xl font-semibold pb-10">
                    Buku Hijau Cerebrum
                </div>
                <div class="flex w-full justify-start items-center gap-x-5 pb-10">
                    <img class="w-20 h-20" src="/pictures/fotoadmin.png" alt="">
                    <div class="flex flex-col items-start">
                        <span class="font-semibold">{{{Auth::user()->nama}}}</span>
                        <span>Panitia</span>
                    </div>
                </div>
                <nav class="= flex-1 flex flex-col text-backgroundCerebrum items-start gap-y-4 text-sm">

                    <button id="nilai" class="flex items-center justify-between  w-full gap-x-3">
                        <div class="flex gap-x-3">
                            <img src="/pictures/iconnilai.png" class="w-5" alt="">

                            <a href="{{route('listkegiatan.panitia')}}">List Kegiatan</a>
                        </div>
                    </button>

                    <button id="manajemen" class="flex items-center justify-between w-full gap-x-3">
                        <div class="flex gap-x-3">
                            <img src="/pictures/iconmahasiswa.png" class="w-5" alt="">

                            <a href="{{route('panitia.manage')}}">Manajemen Mahasiswa</a>

                        </div>
                    </button>

                </nav>


                <a class="flex justify-center items-center text-white bg-backgroundCerebrum w-24 h-7 rounded-full text-xs"
                    href="{{route('admin')}}">
                    Home
                </a>

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
    </body>
    @endif


</body>