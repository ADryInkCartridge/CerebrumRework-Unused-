@extends('layouts.sidenav')
@section('content')


<div class="p-10">
    <div class="font-medium text-white text-3xl pb-4">Tambah Ormawa</div>
    <div class="w-full tambahuserheight bg-white rounded-xl p-10 relative">
        @include('flash-message')
        <form class="flex flex-col gap-y-8  h-full" method="POST" action="{{ route('tambahormawa.post') }}">
            @csrf
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">Nama</label>
                <input type="text" id="nama" name="nama" class="w-96 rounded-lg">
            </div>
            <div class="flex flex-col gap-y-5">
                <label class="font-semibold pr-44 text-2xl text-grayCerebrum" for="">Nama User</label>
                <select name="user_id" id="user_id" class="w-96 rounded-lg">
                    @foreach($users as $user)
                    <option value="{{$user->user_id}}">{{$user->nama}}</option>
                    @endforeach
                </select>
            </div>
            <!-- <div class="flex flex-1 items-end justify-end pr-20 pb-10"> -->
            <button class="absolute right-10 bottom-10 w-36 h-12 rounded-lg bg-backgroundCerebrum text-white"
                type="Submit">Tambah</button>
            <!-- </div> -->
        </form>
    </div>
</div>


@endsection