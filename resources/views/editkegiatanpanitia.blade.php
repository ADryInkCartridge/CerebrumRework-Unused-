@extends('layouts.sidenav')

@section('content')

<div class="p-10">
    <div class="font-medium text-white text-3xl pb-4">Edit Kegiatan</div>
    <div class="w-full tambahuserheight bg-white rounded-xl p-10 relative">
        @include('flash-message')
        <form class="flex flex-col gap-y-8 h-full" method="POST" action="{{route('kegiatanpanitia.update')}}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$id_kegiatan}}">
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-28 text-2xl text-grayCerebrum" for="">Nama Kegiatan</label>
                <input type="text" id="nama_kegiatan" name="nama_kegiatan" class="w-96 rounded-lg">
            </div>
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-44 text-2xl text-grayCerebrum" for="">Divisi</label>
                <select name="divisi" id="divisi" class="w-96 rounded-lg">
                    @foreach($divisis as $divisi)
                    <option value="{{$divisi->id}}">{{$divisi->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">Tahap</label>
                <select name="tahap" id="tahap" class="w-96 rounded-lg">
                    @foreach($tahaps as $tahap)
                    <option value="{{$tahap->id}}">{{$tahap->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-y-5">
                <label class="w-96 font-semibold pr-40 text-2xl text-grayCerebrum" for="">SN</label>
                <input type="number" step="0.1" name="sn" class="form-control w-96 rounded-lg" />
            </div>
            <div class="flex flex-1 items-end justify-end  absolute bottom-10 right-10">
                <button class="w-36 h-12 rounded-lg bg-backgroundCerebrum text-white" type="Submit">Update</button>
            </div>
        </form>
    </div>
</div>


@endsection