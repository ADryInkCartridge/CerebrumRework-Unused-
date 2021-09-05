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
    public function nilaiPanitia($id){
        $data = NilaiPanitia::join('mahasiswa','nilai_panitia.id_mhs','=','mahasiswa.id')->where(
            'nilai_panitia.id_kegiatan','=',$id)->orderBy('nilai_panitia.id_mhs','asc')->paginate(10);
        $id_panitia = KegiatanPanitia::where('id','=',$id)->first();

        return view('listnilaipanitia',['nilais' => $data,'id_kegiatan' => $id,'id_panitia'=> $id_panitia]);
    }
    // public function tambahNilaiPanitia($id_panitia, $id_kegiatan)
    // {
    //     $id = Auth::user();
    //     dd($id);
    //     $data = Mahasiswa::whereIn('kelompok', function($query) use ($id)
    //     {
    //         $query->select('kelompok')->from(with(new Panitia)->getTable())->where('user_id', $id);
    //         dd($id);
    //         dd($query);
    //     })->get();
    //     dd($data);
    //     return view('tambahnilaiormawa',['mahasiswas' => $data,'id_kegiatan' => $id_kegiatan,'id_ormawa' => $id_ormawa]);
    // }
    public function tambahNilaiPanitia($id_panitia, $id_kegiatan)
    {
        $id = Auth::user()->user_id;
        $data = Mahasiswa::whereIn('kelompok', function($query) use ($id)
        {
            $query->select('kelompok')->from(with(new Panitia)->getTable())->where('user_id', $id);
        })->get();
        return view('tambahnilaipanitia',['mahasiswas' => $data,'id_kegiatan' => $id_kegiatan,'id_panitia' => $id_panitia]);
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
        return view('tambahnilaipanitia',['mahasiswas' => $data,'id_kegiatan' => $request->id_kegiatan,'id_panitia' => $id]);
    }
    
}
