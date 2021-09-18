@extends('layouts.mahasiswanav')

@section('content')
<div class="bg-white  mt-10 rounded-xl flex flex-col font-sans p-10 h-full">
    <h2 class="text-2xl pb-10 text-grayCerebrum">Rapor Kaderisasi</h2>
    <embed src="{{ asset('storage/petunjuk/'.$petunjuk->file_path) }}" height="800" alt="pdf" />
</div>

@endsection