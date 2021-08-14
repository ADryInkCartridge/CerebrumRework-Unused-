@extends('layouts.sidenav')

@section('content')

<div class="pt-10">
    <div class="font-medium text-white text-3xl pb-4">Tambah User</div>
    <div class="w-5/6 h-5/6 bg-white rounded-xl ">
        <form class="flex flex-col gap-y-20" action="">
            <div class="pt-28 pl-11">
                <label class="font-semibold pr-28 text-2xl text-grayCerebrum" for="">Username</label>
                <input type="text" id="" name="" class="w-96 rounded-lg">
            </div>
            <div class="pl-11">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">Nama</label>
                <input type="text" id="" name="" class="w-96 rounded-lg">
            </div>
            <div class="pl-11">
                <label class="font-semibold pr-44 text-2xl text-grayCerebrum" for="">Role</label>
                <select name="Role" id="" class="w-96 rounded-lg">
                    <option value="Super User">Super User</option>
                    <option value="Ormawa">Ormawa</option>
                    <option value="Panitia">Panitia</option>
                </select>
            </div>
            <div class="flex justify-end pr-20 pb-10">
                <button class="w-36 h-12 rounded-lg bg-backgroundCerebrum text-white" type="Submit">Tambah</button>
            </div>
        </form>
    </div>
</div>


@endsection