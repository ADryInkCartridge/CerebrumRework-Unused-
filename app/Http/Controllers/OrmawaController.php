<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ormawa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Response;

class OrmawaController extends Controller
{
    public function index(){
        return view('ormawa');
    }
    public function listormawa(Request $request)
    {
        $data = Ormawa::join('users','ormawa.user_id','=','users.user_id')->select(
            'users.nama as namauser', 'id', 'ormawa.nama as namaormawa')->where([
            ['id','!=',NULL],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('namaormawa','LIKE','%'. $term .'%')->orWhere('namauser','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderBy('id','asc')->paginate(10);
        return view('listormawa',['ormawas' => $data]);
    }
    public function tambahOrmawa()
    {
        $data = User::where('role','Ormawa')->get();
        return view('tambahormawa',['users' => $data]);
    }
    public function addOrmawa(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'user_id'=> 'required'
        ]);
        Ormawa::create([
            'nama' => $request['nama'],
            'user_id'=> $request['user_id']
        ]);
        return redirect()->route('tambahormawa')->with('success', 'Ormawa Berhasil Ditambahkan');
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
