@extends('layouts.sidenav')

@section('content')

<div class="pt-10 pr-10">
    <div class="font-medium text-white text-3xl pb-4">Tambah User</div>
    <div class="w-full tambahuserheight bg-white rounded-xl">
        <form class="flex flex-col gap-y-16  h-full" action="">
            <div class="pt-28 pl-11 flex flex-col gap-y-5">
                <label class="font-semibold pr-28 text-2xl text-grayCerebrum" for="">Tahap</label>
                <input type="text" id="" name="" class="w-96 rounded-lg">
            </div>
            <div class="pl-11 flex flex-col gap-y-5">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">Divisi</label>
                <input type="text" id="" name="" class="w-96 rounded-lg">
            </div>
            <div class="pl-11 flex flex-col gap-y-5">
                <label class="font-semibold pr-40 text-2xl text-grayCerebrum" for="">Nama Kegiatan</label>
                <input type="text" id="" name="" class="w-96 rounded-lg">
            </div>
            <div class="pl-11 flex flex-col gap-y-5">
                <label class="font-semibold pr-44 text-2xl text-grayCerebrum" for="">SN</label>
                <select name="Role" id="" class="w-96 rounded-lg">
                    <option value="Super User">Super User</option>
                    <option value="Ormawa">Ormawa</option>
                    <option value="Panitia">Panitia</option>
                </select>
            </div>
            <div class="flex flex-1 items-end justify-end pr-20 pb-10">
                <button class="w-36 h-12 rounded-lg bg-backgroundCerebrum text-white" type="Submit">Tambah</button>
            </div>
        </form>
    </div>
</div>


@endsection