@extends('layouts.sidenav')
@section('content')
@include('flash-message')
<div class="py-8 pr-10 pl-5 flex flex-col font-sans">
    <div class="flex justify-between">
        <div class="flex flex-col">
            <span class="text-3xl pb-4 text-white">Nilai Mahasiswa</span>
            <div class="relative">
            </div>

        </div>


    </div>
    <div class="pt-5 w-full">
        <div class="table table-fixed w-full rounded-2xl overflow-hidden">
            <div class="table-header-group">
                <div class="table-row h-20 bg-greenTableheader text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle ">No </div>
                    <div class="table-cell w-32 text-center align-middle ">Divisi</div>
                    <div class="table-cell w-1/4 text-center align-middle">Tahap</div>
                    <div class="table-cell w-1/4 text-center align-middle">Kegiatan</div>
                    <div class="table-cell w-1/4 text-center align-middle">SN</div>
                    <div class="table-cell w-1/4 text-center align-middle">BN</div>
                    <div class="table-cell w-1/4 text-center align-middle">TN</div>

                </div>
            </div>
            <div class="table-row-group overflow-y-scroll h-96">

                @foreach($nilais as $index => $nilai)
                <div class="table-row h-20 text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle  ">
                        <span class="">{{$index+1}}</span>
                    </div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$nilai['divisi']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$nilai['tahap']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$nilai['kegiatan']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$nilai['sn']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$nilai['bn']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">{{$nilai['tn']}}</div>
                    <div class="table-cell w-32 text-center align-middle relative">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="flex flex-row mt-4">
            <div>
                <div class="flex flex-row gap-x-4">
                    {{ $nilais->links('custompaginator') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection