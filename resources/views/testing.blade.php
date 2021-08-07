@extends('layouts.sidenav')

@section('content')

    <div>
        <div class="flex flex-row pt-12 space-x-84 pb-3">
            <div>
                <div class="text-2xl text-white font-medium pb-2">
                    List Mahasiswa
                </div>
                <div>
                    <input type="text" id="searchbar" name="searchbar" placeholder="Search" class="w-72 h-8 rounded-lg">
                </div>
            </div>
            <div class="">
                <div class="w-full h-8  bg-black flex justify-center rounded-lg">
                    <button class="text-white text-base" type="button" onclick="alert('Mahasiswa berhasil ditambah')">Tambah Mahasiswa +</button>
                </div>
                <div class="text-base flex flex-row space-x-5 justify-center pt-2.5">
                    <div class="text-white">
                        Show: 
                    </div>
                    <div>
                        <button class="bg-white w-14 h-full rounded-lg flex flex-row justify-center gap-x-1 items-center">
                            <div>
                                10
                            </div>
                            <img src="pictures/dropdown_grey.png" alt="" class="w-3">
                        </button>
                    </div>
                    <div class="text-white">
                        entries
                    </div>
                </div>
            </div>
        </div>

        <!-- Tables -->
        <div class="pt-6 bg-greenTableheader w-5/6 rounded-t-2xl">
            <table class="">
                <tr class="text-xl flex flex-row items-center h-10">
                    <th class="flex justify-center pr-11">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 rounded"><span class="ml-2 text-gray-700"></span>
                        </label>
                    </th>
                    <th class="pr-28">No</th>
                    <th class="pr-44">Nama</th>
                    <th class="pr-32">NIM</th>
                    <th class="pr-12">Kelompok</th>
                    <th>
                        <button>
                            <img src="pictures/threebutton.png" alt="" class="w-10">
                        </button>
                    </th>
                </tr>
                <tr class="flex flex-row items-center bg-greenTable1 w-5/6">
                    <td class="pr-11 flex flex-row justify-center">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 rounded"><span class="ml-2 text-gray-700"></span>
                        </label>
                    </td>
                    <td class="">1</td>
                    <td class="">Wardatun Faizah</td>
                    <td class="">20084025396113</td>
                    <td class="">8</td>
                    <td>
                        <button>
                            <img src="pictures/threebutton.png" alt="" class="w-10">
                        </button>
                    </td>
                </tr>
            </table>
        </div>

    </div>

@endsection
