@extends('layouts.sidenav')

@section('content')
    <div id="tambahoverlay" class="absolute inset-0 hidden justify-center bg-black bg-opacity-50 z-10 items-center">
        <div class="w-1/3 bg-white h-1/3 rounded-xl py-10 flex flex-col items-center justify-center gap-y-10 relative">
        <button id="closeoverlaybtn" class="absolute top-5 right-5 z-10">x</button>
        <span class="text-3xl text-black font-semibold">Tambah Mahasiswa</span>
        <div class="items-center flex gap-x-20 text-white ">
            <button class="w-36 h-14 bg-greenTableheader rounded-md font-semibold">Upload File</button>
            <button class="w-36 h-14 bg-greenTable1 rounded-md font-semibold">Manual</button>
        </div>
      </div>
    </div>
    <div class="py-8 pr-10 pl-5 flex flex-col font-sans">
        <div class="flex justify-between">
            <div class="flex flex-col text-white">
                <span class="text-3xl pb-4">List User</span>
                    <div class="relative">
                        <img class="absolute w-4 left-3 top-0 bottom-0 my-auto" src="pictures/search_grey.png" alt="">
                        <input class="rounded-lg h-9 w-64 pl-10" type="text" name="" id="" placeholder="Search">
                    </div>

            </div>
            <div class="flex flex-col justify-end">
                <button id="tambahbtn" class="bg-greenTableheader rounded-md h-8 text-white font-semibold mb-3">
                    Tambah User +
                </button>
                <div class="flex gap-x-4 items-center">
                    <span class="text-white">Show :</span>
                    <select class="h-7 py-0 px-2 w-16 text-sm rounded-lg" name="" id="">
                        <option value="">10</option>
                        <option value="">25</option>
                        <option value="">50</option>
                    </select>
                    <span class="text-white">entries</span>
                </div>
            </div>


        </div>
        <div class="pt-5 w-full">
            <div class="table w-full rounded-2xl overflow-hidden">
                <div class="table-header-group">
                <div class="table-row h-20 bg-greenTableheader text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle ">No</div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>

                    </div>
                </div>
                <div class="table-row-group overflow-y-scroll h-96">
                    <div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle relative">
                            <button id="editbtn"><img src="pictures/titik.png" alt=""></button>
                            <div id="editdropdown" class="absolute bg-white text-black text-sm hidden flex-col mx-auto right-0 w-32 left-0 rounded-md overflow-hidden shadow-xl">
                                <button id="closeedit" class="self-end bg-greenTableheader w-full flex justify-end pr-2 h-6">x</button>
                                <a href="">
                                    <div class="border-b-2 h-6 pl-2 text-left">
                                    Hapus
                                </div></a>
                                <a href="">
                                    <div class="text-left pl-2 h-6">
                                    Hapus
                                </div></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>
                    </div><div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>
                    </div><div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>
                    </div><div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>
                    </div><div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>
                    </div>
                    <div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>
                    </div>
                    <div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>
                    </div><div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>
                    </div><div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>
                    </div><div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>
                    </div><div class="table-row h-20 text-white text-xl font-semibold ">
                        <div class="table-cell w-32 text-center align-middle  ">
                        <input class="mb-1 " type="checkbox" name="" id="">    
                        <span class="pl-5">No</span></div>
                        <div class="table-cell w-1/4 text-center align-middle">Username</div>
                        <div class="table-cell w-1/4 text-center align-middle">Nama</div>
                        <div class="table-cell w-1/4 text-center align-middle">Role</div>
                        <div class="table-cell w-32 text-center align-middle "></div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection