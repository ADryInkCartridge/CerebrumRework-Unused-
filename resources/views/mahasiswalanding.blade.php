@extends('layouts.mahasiswanav')

@section('content')
<div class="bg-white w-96 h-84 mx-auto rounded-xl mt-44 flex flex-col items-center font-sans pt-10">
    <h2 class="text-2xl pb-10 text-grayCerebrum">Rapor Kaderisasi</h2>
    <form class="flex flex-col gap-y-8 items-center" method='GET' role='search' action="{{route('mahasiswa.search')}}">
        @csrf
        <input class="w-72 border-2 border-grayCerebrum h-8 rounded-lg" type="text" name="id_cerebrum" id=""
            placeholder="NIM">
        <input class="w-72 border-2 border-grayCerebrum h-8 rounded-lg" type="text" name="tanggal_lahir" id=""
            placeholder="Tanggal Lahir dengan format(tanggal/bulan/tahun)">
        <button
            class="w-24 h-6 bg-backgroundCerebrum flex items-center justify-center text-xs text-white rounded-xl">Search</button>
    </form>

</div>
@endsection