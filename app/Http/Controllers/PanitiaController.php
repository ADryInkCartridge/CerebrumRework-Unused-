<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\NilaiPanitia;
use App\Models\KegiatanPanitia;
use App\Models\Mahasiswa;
use App\Models\Tahap;
use App\Models\Panitia;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            if ($user->role == 'Super User'){
                return redirect('admin');
            }
            else if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return view('panitia');
            }
        }
        return redirect('login');
    }
    public function nilaiPanitia($id, Request $request){
        
        $iduser = Auth::user()->user_id;
        $data = Mahasiswa::whereIn('kelompok', function($query) use ($iduser)
        {
            $query->select('kelompok')->from(with(new Panitia)->getTable())->where('user_id', $iduser);
        })->join('nilai_panitia','nilai_panitia.id_mhs','=','mahasiswa.id')->where(
        'nilai_panitia.id_kegiatan','=',$id)->where(function ($query) use ($request) {
            $query->where('mahasiswa.nama', 'LIKE', '%' . $request->term . '%' )->orWhere('mahasiswa.id_cerebrum', 'LIKE', '%' . $request->term . '%' );
        })->orderBy('nilai_panitia.id_mhs','asc')->paginate(10);
        $id_panitia = KegiatanPanitia::where('id','=',$id)->first();

        return view('listnilaipanitia',['nilais' => $data,'id_kegiatan' => $id,'id_panitia'=> $id_panitia]);
    }

    // public function tambahNilaiPanitia($id_panitia, $id_kegiatan)
    // {
    //     $id = Auth::user()->user_id;
    //     $data = Mahasiswa::whereIn('kelompok', function($query) use ($id)
    //     {
    //         $query->select('kelompok')->from(with(new Panitia)->getTable())->where('user_id', $id);
    //     })->get();
    //     return view('tambahnilaipanitia',['mahasiswas' => $data,'id_kegiatan' => $id_kegiatan,'id_panitia' => $id_panitia]);
    // }

    public function editNilaiPanitia($id_nilai,)
    {
        $nilai = nilaiPanitia::join('mahasiswa','mahasiswa.id','=','nilai_panitia.id_mhs')->where('nilai_panitia.id','=',$id_nilai)->select(
            'nilai_panitia.*','mahasiswa.nama','mahasiswa.id_cerebrum'
        )->first();
        return view('editnilaipanitia',['nilai'=> $nilai]);
    }
    public function addNilaiPanitia(Request $request)
    {
        
        $keg = KegiatanPanitia::where('id','=',$request->id)->first();
        $sn = $keg->sn;
        $request->validate([
            'id' => 'required',
            'id_mhs'=> 'required',
            'bn'=> 'required',
        ]);
        NilaiPanitia::create([
            'id_kegiatan' => $request['id'],
            'id_mhs'=> $request['id_mhs'],
            'bn'=> $request['bn'],
            'tn'=> $request['bn'] * $sn,
        ]);
        $id = Auth::user();
        $data = Mahasiswa::whereIn('kelompok', function($query) use ($id)
        {
            $query->select('kelompok')->from(with(new Panitia)->getTable())->where('user_id', $id->user_id);
        })->get();
        return view('tambahnilaipanitia',['mahasiswas' => $data,'id_kegiatan' => $request->id,'id_panitia' => $request->id_panitia]);
    }
    
    public function updateNilaiPanitia(Request $request)
    {
        $nil = NilaiPanitia::where('id','=',$request->id)->first();
        $keg = KegiatanPanitia::where('id','=',$nil->id_kegiatan)->first();
        $sn = $keg->sn;
        $request->validate([
            'id' => 'required',
            'bn'=> 'required',
        ]);
        NilaiPanitia::where('id',$request->id)->update([
            'bn'=> $request['bn'],
            'tn'=> $request['bn'] * $sn,
        ]);

        return redirect()->route('nilaiPanitia',[$keg->id]);
    }
    
}
