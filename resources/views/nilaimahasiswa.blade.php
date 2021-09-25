@extends('layouts.sidenav')
@section('content')
@include('flash-message')
<div class="py-8 pr-10 pl-5 flex flex-col font-sans">
    <div class="flex justify-between">
        <div class="flex flex-col">
            <span class="text-3xl pb-4 text-white">Nilai Mahasiswa</span>
            <div class="relative">
            </div>
            <!-- <button>
                <div class="bg-greenTable1 flex justify-center w-48 rounded-md">
                    <a class="text-lg font-medium text-white" href="{{route('panitia.pdf',$id)}}">Download PDF</a>
                </div>
            </button> -->
        </div>
        <div>
            <span class="text-3xl pb-4 text-white">{{$mhs->nama}}</span>
            <div class="text-3xl pb-4 text-white">
                {{$mhs->id_cerebrum}}
            </div>
        </div>

    </div>
    <div class="pt-5 w-full">
        <div class="table table-fixed w-full rounded-2xl ">
            <div class="table-header-group">
                <div class="table-row h-20 bg-greenTableheader text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle ">No</div>
                    <div class="table-cell w-1/4 text-center align-middle">Tahap</div>
                    <div class="table-cell w-1/4 text-center align-middle">TN</div>
                    <div class="table-cell w-32 text-center align-middle "></div>

                </div>
            </div>
            <div class="table-row-group overflow-y-scroll h-96">
                @php
                $total = 0
                @endphp
                @foreach($nilais as $index => $nilai)
                <div class="table-row h-20 text-white text-xl font-semibold ">
                    <div class="table-cell w-32 text-center align-middle  ">
                        <span class="">{{$index+1}}</span>
                    </div>
                    <div class="table-cell w-1/4 text-center align-middle bg">{{$nilai['tahap']}}</div>
                    <div class="table-cell w-1/4 text-center align-middle">
                        @if($nilai->total_tn)
                        @php
                        $total = $total + $nilai->total_tn
                        @endphp
                        {{$nilai['total_tn']}}
                        @else
                        0
                        @endif
                    </div>
                    <div class="table-cell w-32 text-center align-middle relative">
                        <button class="editbtn" id=""><img src="/pictures/titik.png" alt=""></button>
                        <div id=""
                            class="absolute editdropdown bg-white text-black text-sm hidden flex-col mx-auto right-0 w-32 left-0 rounded-md overflow-hidden shadow-xl z-10">
                            <button id=""
                                class="self-end items-center closeedit bg-greenTableheader w-full flex justify-end pr-2 h-6">
                                <img class=" w-3" src="/pictures/close.png" alt="">
                            </button>
                            <a href="{{route('mahasiswa.detailnilai',[$nilai->tahap,$id])}}">
                                <div class="border-b-2 h-6 pl-2 text-left">
                                    Detail
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- <p>{{$total}}</p> -->
            </div>
        </div>
        <div
            class="bg-greenTableheader flex justify-center items-center h-20 gap-x-14 w-full text-center align-middle col-span-full text-white font-semibold text-lg">
            <div>
                Total
            </div>
            <div>
                {{$total}}
            </div>
        </div>

        <div class="flex flex-row mt-4">
            <div>
                <div class="flex flex-row gap-x-4">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection