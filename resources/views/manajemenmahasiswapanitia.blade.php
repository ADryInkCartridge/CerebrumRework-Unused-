@extends('layouts.sidenav')
@section('content')
@include('flash-message')
<div class="py-8 pr-10 pl-5 flex flex-col font-sans">
    <div class="flex justify-between">
        <div class="flex flex-col">
            <span class="text-3xl pb-4 text-white">List Mahasiswa</span>
            <div class="relative">
                <form class="" action="" method="GET" role='search'>
                    @csrf
                    <input class="rounded-lg h-9 w-64 pl-2" type="text" name="term" id="term" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="" type="submit" class="btn btn-default">
                            <img class="w-5 pt-2" src="/pictures/search_grey.png" alt="">
                        </button>
                    </span>
                </form>
            </div>

        </div>


    </div>
    <div class="pt-5 w-full">
        <div class="table table-fixed w-full rounded-2xl">
            <div class="table-header-group">
                <div class="table-row h-20 bg-greenTableheader text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle ">No</div>
                    <div class="table-cell w-1/4 text-center align-middle">ID Cerebrum</div>
                    <div class="table-cell w-1/4 text-center align-middle">Nama Mahasiswa</div>
                    <div class="table-cell w-1/4 text-center align-middle">Kelompok</div>
                    <div class="table-cell w-32 text-center align-middle "></div>

                </div>
            </div>
            <div class="table-row-group overflow-y-scroll h-96">

                @foreach($mahasiswas as $index => $mahasiswa)
                <div class="table-row h-20 text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle  ">
                        <span class="">{{($mahasiswas->currentPage()-1) * 10 + $index+1}}</span>
                    </div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$mahasiswa['id_cerebrum']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$mahasiswa['nama']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$mahasiswa['kelompok']}}</div>
                    <div class="table-cell w-32 text-center align-middle relative">
                        <button class="editbtn" id=""><img src="/pictures/titik.png" alt=""></button>
                        <div id=""
                            class="absolute editdropdown bg-white text-black text-sm hidden flex-col mx-auto right-0 w-32 left-0 rounded-md overflow-hidden shadow-xl z-10">
                            <button id=""
                                class="self-end items-center closeedit bg-greenTableheader w-full flex justify-end pr-2 h-6">
                                <img class=" w-3" src="/pictures/close.png" alt="">
                            </button>
                            <a href="{{route('panitia.detail', $mahasiswa->id)}}">
                                <div class="border-b-2 h-6 pl-2 text-left">
                                    Detail
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
                    {{ $mahasiswas->links('custompaginator') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection