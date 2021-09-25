@extends('layouts.sidenav')

@section('content')

<div class="p-10">
    <div class="font-medium text-white text-3xl pb-4">Alokasi Mahasiswa</div>
    <div class="w-full tambahuserheight bg-white rounded-xl p-10 relative">
        @include('flash-message')
        <form class="flex flex-col gap-y-8  h-full" method="post" action="{{route('editmhsormawa.post')}}">
            @csrf
            <div class="flex flex-col gap-y-5">
                <input type="hidden" name="id" value="{{$id}}">
                <label class="font-semibold pr-28 text-2xl text-grayCerebrum" for="">Nama Mahasiswa</label>
                <select name="mahasiswa_id" class="form-control select2 w-96 rounded-lg" placeholder="Nama Mahasiswa"
                    required>
                    @foreach($mahasiswas as $mahasiswa)
                    <option value="{{$mahasiswa->id}}">{{$mahasiswa->id_cerebrum}} - {{$mahasiswa->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-44 text-2xl text-grayCerebrum" for="">Ormawa</label>
                <select name="ormawa_id" id="ormawa_id" class="w-96 rounded-lg">
                    @foreach($ormawas as $ormawa)
                    <option value="{{$ormawa->id}}">{{$ormawa->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-1 items-end justify-end  absolute bottom-10 right-10">
                <button class="w-36 h-12 rounded-lg bg-backgroundCerebrum text-white" type="Submit">Edit</button>
            </div>
        </form>
    </div>
</div>


@endsection