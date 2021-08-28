@extends('layouts.mahasiswanav')

@section('content')
<div class="flex flex-col gap-y-10 items-center pt-24">
    <h1 class="text-4xl text-white">Rapor Kaderisasi - <span>INSERT NAME HERE</span></h1>
    <button class="w-96 h-12 rounded-lg bg-white">Pembinaan</button>
    <button class="w-96 h-12 rounded-lg bg-white">Penyambutan</button>
    <button class="w-96 h-12 rounded-lg bg-white">Orientasi Ormawa</button>
    <button class="flex bg-greenTable1 w-36 rounded-xl justify-center gap-x-3 text-white h-10 items-center text-xl">Download <img class="object-contain w-5 h-5" src="pictures/download.png" alt=""></button>
</div>
@endsection