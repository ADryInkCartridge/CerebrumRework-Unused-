<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Ormawa;
use Illuminate\Support\Facades\DB;
use Auth;

class KegiatanController extends Controller
{
    public function editkegiatan($id){
		$Kegiatan = Kegiatan::where('id',$id)->first();
        return view('editkegiatan',['kegiatan' => $Kegiatan]);
    }

    public function tambahKegiatan()
    {
        $userid = Auth::user()->user_id;
        $data = Ormawa::where('user_id',$userid)->get();
        return view('tambahkegiatan',['ormawas'=> $data]);
    }
    
    public function addKegiatan(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'id_ormawa' => 'required',
            'jenis_kegiatan' => 'required',
            'sn' => 'required',
        ]);

        Kegiatan::create([
            'nama_kegiatan' => $request['nama_kegiatan'],
            'id_ormawa' => $request['id_ormawa'],
            'jenis_kegiatan' => $request['jenis_kegiatan'],
            'sn' => $request['sn'],
        ]);
        return redirect()->route('tambahkegiatan')->with('success', 'Kegiatan Berhasil Ditambahkan');
    }
    public function listkegiatan(Request $request)
    {
        $userid = Auth::user()->user_id;
        $data = Kegiatan::join('ormawa','id_ormawa','=','ormawa.id')->where([
            ['id_ormawa','!=',NULL],
            ['user_id','=',$userid],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nama_kegiatan','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderBy('id_ormawa','asc')->paginate(10);
        return view('listkegiatan',['kegiatans' => $data]);
    }
}

