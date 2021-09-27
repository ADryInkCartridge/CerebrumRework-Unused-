@extends('layouts.sidenav')

@section('content')

<div class="p-10">
    <div class="font-medium text-white text-3xl pb-4">Alokasi Mahasiswa</div>
    <div class="w-full tambahuserheight bg-white rounded-xl p-10 relative">
        @include('flash-message')
        <form class="flex flex-col gap-y-8  h-full" method="post" action="{{route('nilaiOrmawa.post')}}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$nilai->id}}">
            <div class="flex flex-col gap-y-2 font-semibold pr-40 text-2xl text-grayCerebrum">
                <div class="flex flex-col gap-y-2">
                    <label class="font-semibold pr-28 text-2xl text-grayCerebrum" for="">Nama Mahasiswa</label>
                    <input type="text" id="" name="" value="{{$nilai->nama}}" class="w-96 rounded-lg" disabled>
                </div>
                <div class="flex flex-col gap-y-2">
                    <label class="font-semibold pr-28 text-2xl text-grayCerebrum" for="">NIM</label>
                    <input type="text" id="" name="" value="{{$nilai->id_cerebrum}}" class="w-96 rounded-lg" disabled>
                </div>
                <div class="flex flex-col gap-y-2">
                    <label class="font-semibold pr-28 text-2xl text-grayCerebrum" for="">Tahap</label>
                    <input type="text" id="" name="" value="{{$nilai->tahap}}" class="w-96 rounded-lg" disabled>
                </div>
                <div class="flex flex-col gap-y-2">
                    <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">BN</label>
                    <input type="number" step="1" name="bn" class="form-control w-96 rounded-lg" />
                </div>
                <div class="flex flex-1 items-end justify-end  absolute bottom-10 right-10">
                    <button class="w-36 h-12 rounded-lg bg-backgroundCerebrum text-white" type="Submit">Nilai</button>
                </div>
            </div>
    </div>


    @endsection