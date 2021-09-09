@extends('layouts.panitiasidenav')

@section('content')

<div class="p-10">
    <div class="font-medium text-white text-3xl pb-4">Nilai Mahasiswa</div>
    <div class="w-full tambahuserheight bg-white rounded-xl p-10 relative">
        @include('flash-message')
        <form class="flex flex-col gap-y-8  h-full" method="post" action="{{route('nilaiPanitia.edit')}}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$nilai->id}}">
            <div class="flex flex-col gap-y-5 font-semibold pr-40 text-2xl text-grayCerebrum">
                <p>
                    {{$nilai->nama}}
                </p>
                <p>
                    {{$nilai->id_cerebrum}}
                </p>
            </div>
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">BN</label>
                <input type="number" step="1" name="bn" class="form-control" />
            </div>
            <div class="flex flex-1 items-end justify-end  absolute bottom-10 right-10">
                <button class="w-36 h-12 rounded-lg bg-backgroundCerebrum text-white" type="Submit">Nilai</button>
            </div>
        </form>
    </div>
</div>


@endsection