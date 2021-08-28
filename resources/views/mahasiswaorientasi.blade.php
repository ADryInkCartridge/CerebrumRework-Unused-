
@extends('layouts.mahasiswanav')

@section('content')
<div class="flex justify-center text-center">
    <h1 class="text-3xl">Orientasi Ormawa - <span>NAMATITID</span></h1>

</div>
<div class="table table-fixed w-full rounded-2xl ">
    <div class="table-header-group">
        <div class="table-row h-20 bg-greenTableheader text-white text-xl font-semibold ">
            <div class="table-cell w-32 text-center align-middle ">No</div>
            <div class="table-cell w-1/4 text-center align-middle ">Divisi</div>
            <div class="table-cell w-1/4 text-center align-middle">Kegiatan</div>
            <div class="table-cell w-32 text-center align-middle">SN</div>
            <div class="table-cell w-32 text-center align-middle">BN</div>
            <div class="table-cell w-32 text-center align-middle ">TN</div>

        </div>
    </div>
    <div class="table-row-group overflow-y-scroll h-96">
        
        @foreach($kegiatans as $index => $kegiatan)
        <div class="table-row h-20 text-white text-xl font-semibold ">
            <div class="table-cell w-32 text-center align-middle  ">
                <span class="">{{$index+1}}</span>
            </div>
            <div class="table-cell w-1/4 text-center align-middle">{{$kegiatan['nama_kegiatan']}}</div>
            <div class="table-cell w-1/4 text-center align-middle">{{$kegiatan['nama']}}</div>
            <div class="table-cell w-32 text-center align-middle">{{$kegiatan['jenis_kegiatan']}}</div>
            <div class="table-cell w-32 text-center align-middle">{{$kegiatan['sn']}}</div>
            <div class="table-cell w-32 text-center align-middle relative"></div>
        </div>
        @endforeach
    </div>
</div>
@endsection

