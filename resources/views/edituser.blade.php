@extends('layouts.sidenav')

@section('content')

<div class="pt-10 pr-10">
    <div class="font-medium text-white text-3xl pb-4">Edit User</div>
    <div class="w-full tambahuserheight bg-white rounded-xl">
        <div>
            {{$user->user_id}}
            {{$user->username}}
            {{$user->nama}}
            {{$user->role}}
        </div>
        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            @foreach ($errors->all() as $error)
            {{$error}}</br>
            @endforeach
        </div>
        @endif
        <form class="flex flex-col gap-y-16  h-full" action="{{route('user.update')}}">
            @csrf
            <input type="hidden" id="user_id" name="user_id" value="{{$user->user_id}}">
            <div class="pt-28 pl-11 flex flex-col gap-y-5">
                <label class="font-semibold pr-28 text-2xl text-grayCerebrum" for="">Username</label>
                <input type="text" id="username" name="username" class="w-96 rounded-lg">
            </div>
            <div class="pl-11 flex flex-col gap-y-5">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">Nama</label>
                <input type="text" id="nama" name="nama" class="w-96 rounded-lg">
            </div>
            <div class="pl-11 flex flex-col gap-y-5">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">Password</label>
                <input type="text" id="password" name="password" class="w-96 rounded-lg">
            </div>
            <div class="pl-11 flex flex-col gap-y-5">
                <label class="font-semibold pr-44 text-2xl text-grayCerebrum" for="">Role</label>
                <select name="role" id="role" class="w-96 rounded-lg">
                    <option value="Super User">Super User</option>
                    <option value="Ormawa">Ormawa</option>
                    <option value="Panitia">Panitia</option>
                </select>
            </div>
            <div class="flex flex-1 items-end justify-end pr-20 pb-10">
                <button class="w-36 h-12 rounded-lg bg-backgroundCerebrum text-white" type="Submit">Update</button>
            </div>
        </form>
    </div>
</div>


@endsection