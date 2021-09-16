@extends('layouts.sidenav')
@section('content')
@include('flash-message')
<div class="py-8 pr-10 pl-5 flex flex-col font-sans">
    <div class="flex justify-between">
        <div class="flex flex-col">
            <span class="text-3xl pb-4 text-white">List Ormawa</span>
            <div class="relative">
                <form action="{{route('listormawa')}}" method="GET" role='search'>
                    @csrf
                    <img class="absolute w-4 left-3 top-0 bottom-0 my-auto" src="pictures/search_grey.png" alt="">
                    <input class="rounded-lg h-9 w-64 pl-10" type="text" name="term" id="term" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <img class="w-5 " src="pictures/search_grey.png" alt="">
                        </button>
                    </span>
                </form>
            </div>

        </div>
        <div class="flex flex-col justify-end">
            <a href="{{route('tambahormawa')}}"
                class="bg-greenTableheader rounded-md h-8 text-white font-semibold mb-3 px-2 flex justify-center items-center">
                Tambah Ormawa +
            </a>

        </div>


    </div>
    <div class="pt-5 w-full">
        <div class="table table-fixed w-full rounded-2xl">
            <div class="table-header-group">
                <div class="table-row h-20 bg-greenTableheader text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle ">No</div>
                    <div class="table-cell w-1/4 text-center align-middle">Nama Ormawa</div>
                    <div class="table-cell w-1/4 text-center align-middle">Nama User</div>
                    <div class="table-cell w-32 text-center align-middle "></div>

                </div>
            </div>
            <div class="table-row-group overflow-y-scroll h-96">

                @foreach($ormawas as $index => $ormawa)
                <div class="table-row h-20 text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle  ">
                        <span class="">{{$index+1}}</span>
                    </div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$ormawa['namaormawa']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$ormawa['namauser']}}</div>
                    <div class="table-cell w-32 text-center align-middle relative">
                        <button class="editbtn" id=""><img src="pictures/titik.png" alt=""></button>
                        <div id=""
                            class="absolute editdropdown bg-white text-black text-sm hidden flex-col mx-auto right-0 w-32 left-0 rounded-md overflow-hidden shadow-xl z-10">
                            <button id=""
                                class="self-end closeedit bg-greenTableheader w-full flex justify-end pr-2 h-6">
                                <img class="pt-1 w-3" src="pictures/close.png" alt="">
                            </button>
                            <a href="{{route('ormawa.edit', $ormawa->id)}}">
                                <div class="border-b-2 h-6 pl-2 text-left">
                                    Edit
                                </div>
                            </a>
                            <form class="flex justify-start" action="{{route('ormawa.delete',[$ormawa->id])}}" method="post">
                                @csrf
                                <input type='hidden' name='user_id' value="{{$ormawa->id}}">
                                <button type="submit">
                                    <div class="text-left font-semibold pl-2 h-6">
                                        Hapus
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="flex flex-row mt-4 w-full justify-center">
            <div>
                <div class="flex flex-row gap-x-4 ">
                    {{ $ormawas->links('custompaginator') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection