@extends('layouts.sidenav')

@section('content')
<div id="tambahoverlay" class="absolute inset-0 hidden justify-center bg-black bg-opacity-50 z-10 items-center">
    <div class="w-1/3 bg-white h-1/3 rounded-xl py-10 flex flex-col items-center justify-center gap-y-10 relative">
        <button id="closeoverlaybtn" class="absolute top-5 right-5 z-10">
            <img class="w-4" src="pictures/close.png" alt="">
        </button>
        <span class="text-3xl text-black font-semibold">Tambah Mahasiswa</span>
        <div class="items-center flex gap-x-20 text-white ">
            <button id="uploadbtn" class="w-36 h-14 bg-greenTableheader rounded-md font-semibold">Upload File</button>
            <button class="w-36 h-14 bg-greenTable1 rounded-md font-semibold">Manual</button>
        </div>
    </div>
</div>
<div id="uploadoverlay" class="absolute inset-0 hidden justify-center bg-black bg-opacity-50 z-10 items-center">
    <div class="w-1/3 bg-white h-1/3 rounded-xl py-10 flex flex-col items-start justify-center gap-y-10 relative">
        <button id="closeuploadoverlaybtn" class="absolute top-5 right-5 z-10">
            <img class="w-4" src="pictures/close.png" alt="">
        </button>
        <h2 class="mt-10 text-2xl font-medium flex justify-start pl-16">
            Upload File
        </h2>
        @if($errors->any())
        <h4>Error</h4>
        @endif
        <div class="flex justify-start pl-16 items-center pb-10">
            <form class="w-2/5" action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-96 h-10 pb-16">
                    <input placeholder="Upload File" class="bg-white text-base" type="file" name="file" id="customFile">
                </div>
                <div class="flex flex-row gap-x-8">
                    <div class=" bg-greenTable1 rounded-lg flex justify-center items-center">
                        <button class=" w-32 h-10 btn btn-primary text-sm">Import data</button>
                    </div>
                    <div class="flex justify-center">
                        <a class="btn btn-success rounded-lg text-sm bg-greenTable1 w-32 h-10 flex justify-center items-center"
                            href="{{ route('file-export') }}">Export data</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="py-8 pr-10 pl-5 flex flex-col font-sans">
    <div class="flex justify-between">
        <div class="flex flex-col">
            <span class="text-3xl pb-4 text-white">List Mahasiswa</span>
            <div class="relative">
                <form action="/search" method="POST" role='search'>
                    @csrf
                    <img class="absolute w-4 left-3 top-0 bottom-0 my-auto" src="pictures/search_grey.png" alt="">
                    <input class="rounded-lg h-9 w-64 pl-10" type="text" name="" id="" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <img class="w-5 " src="pictures/search_grey.png" alt="">
                        </button>
                    </span>
                </form>
            </div>

        </div>
        <div class="flex flex-col justify-end">
            <button id="tambahbtn" class="bg-greenTableheader rounded-md h-8 text-white font-semibold mb-3">
                Tambah Mahasiswa +
            </button>
            <div class="flex gap-x-4 items-center">
                <span class="text-white">Show :</span>
                <select class="h-7 py-0 px-2 w-16 text-sm rounded-lg" name="" id="">
                    <option value="">10</option>
                    <option value="">25</option>
                    <option value="">50</option>
                </select>
                <span class="text-white">entries</span>
            </div>
        </div>


    </div>
    <div class="pt-5 w-full">
        <div class="table w-full rounded-2xl overflow-hidden">
            <div class="table-header-group">
                <div class="table-row h-20 bg-greenTableheader text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle ">No</div>
                    <div class="table-cell w-1/4 text-center align-middle">ID Cerebrum</div>
                    <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                    <div class="table-cell w-1/4 text-center align-middle">Kelompok</div>
                    <div class="table-cell w-32 text-center align-middle "></div>
                </div>
            </div>
            <div class="table-row-group overflow-y-scroll h-96">

                @foreach($listOfMahasiswa as $Mahasiswa)
                <div class="table-row h-20 text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">
                        <span class="pl-5">{{$Mahasiswa['id']}}</span>
                    </div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$Mahasiswa['id_cerebrum']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$Mahasiswa['nama']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$Mahasiswa['kelompok']}}</div>
                    <div class="table-cell w-32 text-center align-middle relative">
                        <button id="editbtn"><img src="pictures/titik.png" alt=""></button>
                        <div id="editdropdown"
                            class="absolute bg-white text-black text-sm hidden flex-col mx-auto right-0 w-32 left-0 rounded-md overflow-hidden shadow-xl">
                            <button id="closeedit"
                                class="self-end bg-greenTableheader w-full flex justify-end pr-2 h-6">
                                <img class="pt-1 w-3" src="pictures/close.png" alt="">
                            </button>
                            <a href="">
                                <div class="border-b-2 h-6 pl-2 text-left">
                                    Edit
                                </div>
                            </a>
                            <a href="">
                                <div class="text-left pl-2 h-6">
                                    Hapus
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="flex flex-row mt-4">
            <div>
                <div class="flex flex-row gap-x-4">
                    {{ $listOfMahasiswa->links('custompaginator') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection