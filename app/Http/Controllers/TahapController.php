<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ormawa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Tahap;
use Response;

class TahapController extends Controller
{
    // public function index(){
    //     return view('manajemenkegiatan');
    // }
    public function listtahap(Request $request)
    {
        $data = Tahap::where([
            ['id','!=',NULL],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nama','LIKE','%'. $term .'%')->orWhere('tipe','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderBy('id','asc')->paginate(10);
        return view('manajemenkegiatan',['tahaps' => $data]);
    }
    public function tambahTahap()
    {
        return view('tambahtahap');
    }
    public function addTahap(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'status'=> 'required',
            'tipe'=> 'required',
        ]);
        Tahap::create([
            'nama' => $request['nama'],
            'status'=> $request['status'],
            'tipe'=> $request['tipe']
        ]);
        return redirect()->route('tambahtahap')->with('success', 'Tahap Berhasil Ditambahkan');
    }
    public function editOrmawa($id){
		$ormawa = Ormawa::where('id',$id)->first();
        $data = User::where('role','Ormawa')->get();
        return view('editormawa',['ormawa' => $ormawa,'users' => $data]);
    }

    public function destroy(Request $request){
        $id = $request['id'];
		if (Ormawa::where('id', '=', $id)->exists()) {
            $Ormawa = Ormawa::where('id',$id)->delete();
            return redirect()->route('listormawa')->with('success', 'Ormawa Berhasil Dihapus');
        }
		return redirect('listormawa')->withErrors('Ormawa tidak ditemukan');
    }
    
    public function updateOrmawa(Request $request){
        $request->validate([
            'nama' => 'required',
            'user_id'=> 'required'
        ]);
        Ormawa::where('id',$request->id)->update([
			'nama' => $request->nama,
            'user_id' => $request->user_id,
		]);
        return redirect()->route('ormawa.edit', [$request->id])->with('success', 'Ormawa Berhasil Diupdate');
    }
}
