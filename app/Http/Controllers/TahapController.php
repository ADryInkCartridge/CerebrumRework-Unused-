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
    public function editTahap($id){
        $tahap = Tahap::where('id',$id)->first();
		return view('edittahap',['tahap' => $tahap]);
    }

    public function deleteTahap(Request $request){
        $id = $request['id'];
		if (Tahap::where('id', '=', $id)->exists()) {
            $tahap = Tahap::where('id',$id)->delete();
            return redirect()->route('listtahap')->with('success', 'Tahap Berhasil Dihapus');
        }
		return redirect('listtahap')->withErrors('Tahap tidak ditemukan');
    }

    public function statusTahap(Request $request){
        $id = $request['id'];
		if (Tahap::where('id', '=', $id)->exists()) {
            $stat = Tahap::where('id',$id)->first();
            if($stat->status==1){
                $tahap = Tahap::where('id',$id)->update([
                    'status' => '0'
                ]);
            }
            else {
                $tahap = Tahap::where('id',$id)->update([
                    'status' => '1'
                ]);
            }
            return redirect()->route('listtahap')->with('success', 'Status Berhasil Diubah');
        }
		return redirect('listtahap')->withErrors('Tahap tidak ditemukan');
    }

    public function updateTahap(Request $request){
        
        $request->validate([
            'nama' => 'required',
            'status'=> 'required',
            'tipe'=> 'required',
        ]);
        Tahap::where('id',$request->id)->update([
			'nama' => $request['nama'],
            'status'=> $request['status'],
            'tipe'=> $request['tipe']
		]);
        return redirect()->route('tahap.edit', [$request->id])->with('success', 'Tahap Berhasil Diupdate');
    }
}
