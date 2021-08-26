@extends('layouts.sidenav')
@section('content')


<div class="p-10">
    <div class="font-medium text-white text-3xl pb-4">Tambah Tahap</div>
    <div class="w-full tambahuserheight bg-white rounded-xl p-10 relative">
        @include('flash-message')
        <form class="flex flex-col gap-y-8  h-full" method="POST" action="{{ route('tambahtahap.post') }}">
            @csrf
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">Nama</label>
                <input type="text" id="nama" name="nama" class="w-96 rounded-lg">
            </div>
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-44 text-2xl text-grayCerebrum" for="">Status</label>
                <select name="status" id="status" class="w-96 rounded-lg">
                    <option value="1">Buka</option>
                    <option value="0">Tutup</option>
                </select>
            </div>
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">Tipe</label>
                <select name="tipe" id="tipe" class="w-96 rounded-lg">
                    <option value="0">Panitia</option>
                    <option value="1">Ormawa</option>
                </select>
            </div>
            <!-- <div class="flex flex-1 items-end justify-end pr-20 pb-10"> -->
            <button class="absolute right-10 bottom-10 w-36 h-12 rounded-lg bg-backgroundCerebrum text-white"
                type="Submit">Tambah</button>
            <!-- </div> -->
        </form>
    </div>
</div>


@endsection