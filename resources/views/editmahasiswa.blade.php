@extends('layouts.sidenav')

@section('content')

<div class="p-10">
    <div class="font-medium text-white text-3xl pb-4">Tambah Mahasiswa</div>
    <div class="w-full tambahuserheight bg-white rounded-xl p-10 relative">
        <div>
            {{$mahasiswa->nama}}
        </div>
        <div>
            {{$mahasiswa->id_cerebrum}}
        </div>
        <div>
            {{$mahasiswa->tanggal_lahir}}
        </div>
        <div>
            {{$mahasiswa->kelompok}}
        </div>
        <form class="flex flex-col gap-y-8  h-full" method="POST" action="{{route('mahasiswa.update')}}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$mahasiswa->id}}">
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-28 text-2xl text-grayCerebrum" for="">Nama Mahasiswa</label>
                <input type="text" id="nama" name="nama" class="w-96 rounded-lg">
            </div>
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">NIM</label>
                <input type="text" id="id_cerebrum" name="id_cerebrum" nameid_cerebrum class="w-96 rounded-lg">
            </div>
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">Tanggal Lahir</label>
                <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="w-96 rounded-lg">
            </div>
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-44 text-2xl text-grayCerebrum" for="">Kelompok</label>
                <input type="text" id="" name="kelompok" class="w-96 rounded-lg">
            </div>
            <div class="flex flex-1 items-end justify-end  absolute bottom-10 right-10">
                <button class="w-36 h-12 rounded-lg bg-backgroundCerebrum text-white" type="Submit">Tambah</button>
            </div>
        </form>
    </div>
</div>


@endsection