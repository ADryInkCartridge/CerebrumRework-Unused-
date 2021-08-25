<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use App\Models\Tahap;
use App\Models\Mhsormawa;
use App\Models\Ormawa;
use Illuminate\Support\Facades\DB;
use Auth;

class MhsormawaController extends Controller
{
    public function editkegiatan($id){
		$Kegiatan = Kegiatan::where('id',$id)->first();
        return view('editkegiatan',['kegiatan' => $Kegiatan]);
    }

    public function tambahMhsormawa()
    {
        $userid = Auth::user()->user_id;
        $data = Ormawa::where('user_id',$userid)->get();
        $mhs = Mahasiswa::all();
        return view('tambahmhsormawa',['ormawas'=> $data,'mahasiswas' => $mhs]);
    }
    
    public function addMhsormawa(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'ormawa_id' => 'required',
        ]);

        Mhsormawa::create([
            'mahasiswa_id' => $request['mahasiswa_id'],
            'ormawa_id' => $request['ormawa_id'],
        ]);
        return redirect()->route('tambahmhsormawa')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    
    public function listmhsormawa(Request $request)
    {
        $data = Mhsormawa::join('mahasiswa','mahasiswa.id','=','mahasiswa_id')->where([
            ['id','!=',NULL],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('mahasiswa.nama','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderBy('id','asc')->paginate(10);
        return view('listmhsormawa',['mhsormawas' => $data]);
    }
}
