<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use App\Exports\MahasiswaExport;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function fileImportExport()
    {
       return view('file-import');
    }
    public function listmahasiswa()
    {
        $data = Mahasiswa::paginate(10);
        return view('listmahasiswa',['listOfMahasiswa' => $data]);
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        if($request->file('file')==NULL)
            return redirect()->back()->withErrors(['Please supply a file with an xslx format']);
        $extension = $request->file('file')->getClientOriginalExtension();
        if($extension!='xlsx')
            return redirect()->back()->withErrors(['File extension needs to be in xlsx format']);
        Excel::import(new MahasiswaImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new MahasiswaExport, 'users-collection.xlsx');
    }    
}
