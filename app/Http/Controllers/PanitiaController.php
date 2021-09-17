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
use DB;
use PDF;

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
    public function listkegiatanpanitia(Request $request)
    {
        $data = KegiatanPanitia::join('tahap','kegiatan_panitia.tahap','=','tahap.id')->join('divisi','kegiatan_panitia.divisi','=','divisi.id')->select(
            'kegiatan_panitia.*','tahap.status as status' ,'tahap.nama as nama_tahap', 'divisi.nama as nama_divisi' )->where([
            ['kegiatan_panitia.id','!=',NULL],
        ])->where(function ($query) use ($request) {
            $query->where('nama_kegiatan', 'LIKE', '%' . $request->term . '%' )->orWhere('tahap', 'LIKE', '%' . $request->term . '%' )->orWhere(
                'divisi', 'LIKE', '%' . $request->term . '%' );
        })->orderBy('kegiatan_panitia.id','asc')->paginate(10);
        return view('listkegiatanpanitia',['kegiatans' => $data]);
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

    public function editNilaiPanitia($id_nilai)
    {
        $nilai = nilaiPanitia::join('mahasiswa','mahasiswa.id','=','nilai_panitia.id_mhs')->join(
            'kegiatan_panitia','kegiatan_panitia.id','=','nilai_panitia.id_kegiatan')->join(
                'tahap','tahap.id','=','kegiatan_panitia.tahap')->join(
                    'divisi','divisi.id','=','kegiatan_panitia.divisi')->where(
                'nilai_panitia.id','=',$id_nilai)->select(
            'nilai_panitia.*','mahasiswa.nama','mahasiswa.id_cerebrum','divisi.nama as divisi','tahap.nama as tahap'
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

    public function manajemenMahasiswaPanitia(Request $request){
        
        $iduser = Auth::user()->user_id;
        $data = Mahasiswa::whereIn('kelompok', function($query) use ($iduser)
        {
            $query->select('kelompok')->from(with(new Panitia)->getTable())->where('user_id', $iduser);
        })->where(function ($query) use ($request) {
            $query->where('mahasiswa.nama', 'LIKE', '%' . $request->term . '%' )->orWhere('mahasiswa.id_cerebrum', 'LIKE', '%' . $request->term . '%' );
        })->paginate(10);
        return view('manajemenmahasiswapanitia',['mahasiswas' => $data]);
    }
    public function detailTahapPanitia($id)
    {

        // $nilai = Tahap::leftJoin('kegiatan_ormawa','tahap.id','=','kegiatan_ormawa.jenis_kegiatan')->leftJoin(
        //     'kegiatan_panitia','tahap.id','=','kegiatan_panitia.tahap')->leftJoin(
        //         'nilai_ormawa','kegiatan_ormawa.id','=','nilai_ormawa.id_kegiatan')->leftJoin(
        //             'mahasiswa','nilai_ormawa.id_mhs','=','mahasiswa.id')->leftJoin(
        //                 'nilai_panitia','kegiatan_panitia.id','=','nilai_panitia.id_kegiatan')->where(
        //                         'nilai_panitia.id_mhs','=',$id)->orWhere('nilai_ormawa.id_mhs','=',$id)->select(
        //                             DB::raw("SUM(nilai_panitia.tn) as total_tn"),DB::raw("SUM(nilai_ormawa.tn) as total_tn2"),'tahap.nama as tahap'
        // )->groupBy('tahap.nama')->orderBy('tahap.id','asc')->paginate(10);
        
        $ormawas = Tahap::join('kegiatan_ormawa','tahap.id','=','kegiatan_ormawa.jenis_kegiatan')->join(
                'nilai_ormawa','kegiatan_ormawa.id','=','nilai_ormawa.id_kegiatan')->join(
                    'mahasiswa','nilai_ormawa.id_mhs','=','mahasiswa.id')->where(
                                'nilai_ormawa.id_mhs','=',$id)->orWhere('nilai_ormawa.id_mhs','=',$id)->select(
                                    DB::raw("SUM(nilai_ormawa.tn) as total_tn"),'tahap.nama as tahap')->groupBy('tahap.nama')->orderBy('tahap.nama','asc')->get();
        $nilai = Tahap::join('kegiatan_panitia','tahap.id','=','kegiatan_panitia.tahap')->join(
                        'nilai_panitia','kegiatan_panitia.id','=','nilai_panitia.id_kegiatan')->where(
                                'nilai_panitia.id_mhs','=',$id)->select(
                                    DB::raw("SUM(nilai_panitia.tn) as total_tn"),'tahap.nama as tahap')->groupBy('tahap.nama')->orderBy('tahap.nama','asc')->get();
        foreach($ormawas as $ormawa) {
            $nilai->add($ormawa);
        }
        // dd($nilai);
        return view('detailtahapmahasiswa',['nilais'=> $nilai,'id'=> $id]);
    }

    public function detailMahasiswa($tahap,$id)
    {
        $tipe = Tahap::where('nama','=',$tahap)->first();
        if($tipe->tipe == 0){
            $nilai = nilaiPanitia::join(
                'kegiatan_panitia','kegiatan_panitia.id','=','nilai_panitia.id_kegiatan')->join(
                    'tahap','tahap.id','=','kegiatan_panitia.tahap')->join(
                        'divisi','divisi.id','=','kegiatan_panitia.divisi')->where(
                    'nilai_panitia.id_mhs','=',$id)->where('tahap.nama','=',$tahap)->select(
                'nilai_panitia.*','kegiatan_panitia.sn as sn','kegiatan_panitia.nama_kegiatan as kegiatan','divisi.nama as divisi','tahap.nama as tahap'
            )->orderBy('nilai_panitia.id','asc')->paginate(10);
        }
        else {
            $nilai = Tahap::join('kegiatan_ormawa','tahap.id','=','kegiatan_ormawa.jenis_kegiatan')->join(
                'nilai_ormawa','kegiatan_ormawa.id','=','nilai_ormawa.id_kegiatan')->join(
                    'mahasiswa','nilai_ormawa.id_mhs','=','mahasiswa.id')->where(
                        'nilai_ormawa.id_mhs','=',$id)->where('tahap.nama','=',$tahap)->select(
                            'nilai_ormawa.*','kegiatan_ormawa.sn as sn','kegiatan_ormawa.nama_kegiatan as kegiatan','tahap.nama as tahap')->orderBy('nilai_ormawa.id','asc')->paginate(10);;
            
        }
        return view('detailMahasiswa',['nilais'=> $nilai]);
    }
    

    public function pdfDownload($id){
        $nilais = Tahap::leftJoin('kegiatan_ormawa','tahap.id','=','kegiatan_ormawa.jenis_kegiatan')->leftJoin(
            'kegiatan_panitia','tahap.id','=','kegiatan_panitia.tahap')->leftJoin(
                'nilai_ormawa','kegiatan_ormawa.id','=','nilai_ormawa.id_kegiatan')->leftJoin(
                    'divisi','divisi.id','=','kegiatan_panitia.divisi')->leftJoin(
                    'mahasiswa','nilai_ormawa.id_mhs','=','mahasiswa.id')->leftJoin(
                        'nilai_panitia','kegiatan_panitia.id','=','nilai_panitia.id_kegiatan')->where(
                                'nilai_panitia.id_mhs','=',$id)->orWhere('nilai_ormawa.id_mhs','=',$id)->select(
                                    'nilai_panitia.*','kegiatan_panitia.sn as sn','kegiatan_panitia.nama_kegiatan as kegiatan',
                                    'divisi.nama as divisi','tahap.nama as tahap','nilai_ormawa.bn as bn2','nilai_ormawa.tn as tn2','kegiatan_ormawa.sn as sn2',
                                    'kegiatan_ormawa.nama_kegiatan as kegiatan2',)->orderBy('tahap.id')->get();
        $pdf = PDF::loadView('rapotPDF',['nilais'=>$nilais,'id'=>$id]);
        return $pdf->download('contacts_list.pdf');
    }
    
}
