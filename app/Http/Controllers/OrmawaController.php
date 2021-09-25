<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ormawa;
use App\Models\Mahasiswa;
use Excel;
use App\Imports\MhsormawaImport;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Response;
use App\Models\Kegiatan;
use App\Models\Tahap;
use App\Models\NilaiOrmawa;
use Illuminate\Support\Facades\DB;

class OrmawaController extends Controller
{
    public function index(){
        return view('ormawa');
    }
    public function nilaiOrmawa($id){
        $data = NilaiOrmawa::join('mahasiswa','nilai_ormawa.id_mhs','=','mahasiswa.id')->where(
            'nilai_ormawa.id_kegiatan','=',$id)->orderBy('nilai_ormawa.id_mhs','asc')->paginate(10);
        $id_ormawa = Kegiatan::where('id','=',$id)->first();
        return view('listnilaiormawa',['nilais' => $data,'id_kegiatan' =>$id,'id_ormawa'=> $id_ormawa]);
    }
    public function tambahNilai($id_ormawa, $id_kegiatan)
    {
        $data = Mahasiswa::join('in_ormawa','mahasiswa.id','=','in_ormawa.mahasiswa_id')->where('ormawa_id','=',$id_ormawa)->get();
        return view('tambahnilaiormawa',['mahasiswas' => $data,'id_kegiatan' => $id_kegiatan,'id_ormawa' => $id_ormawa]);
    }
    public function fileImportExport()
    {
       return view('importmhsormawa');
    }
    public function fileImport(Request $request) 
    {
        if($request->file('file')==NULL)
            return redirect()->back()->withErrors(['Please supply a file with an xslx format']);
        $extension = $request->file('file')->getClientOriginalExtension();
        if($extension!='xlsx')
            return redirect()->back()->withErrors(['File extension needs to be in xlsx format']);
        Excel::import(new MhsormawaImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    public function addNilai(Request $request)
    {
        $keg = Kegiatan::where('id','=',$request->id)->first();
        $sn = $keg->sn;
        $request->validate([
            'id' => 'required',
            'id_mhs'=> 'required',
            'bn'=> 'required',
        ]);
        NilaiOrmawa::create([
            'id_kegiatan' => $request['id'],
            'id_mhs'=> $request['id_mhs'],
            'bn'=> $request['bn'],
            'tn'=> $request['bn'] * $sn,
        ]);
        $data = Mahasiswa::join('in_ormawa','mahasiswa.id','=','in_ormawa.mahasiswa_id')->where('ormawa_id','=',$request->id_ormawa)->get();
        return view('tambahnilaiormawa',['mahasiswas' => $data,'id_kegiatan' => $request->id,'id_ormawa' => $request->id_ormawa]);
    }
    
    public function editkegiatan($id){
		$Kegiatan = Kegiatan::where('id',$id)->first();
        return view('editkegiatan',['kegiatan' => $Kegiatan]);
    }

    public function tambahKegiatan()
    {
        $userid = Auth::user()->user_id;
        $data = Ormawa::where('user_id',$userid)->get();
        $tahap = Tahap::where([['status','=','1'],['tipe','=','1']])->get();
        return view('tambahkegiatan',['ormawas'=> $data,'tahaps' => $tahap]);
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
        ])->select('kegiatan_ormawa.id as id_kegiatan', 'id_ormawa','nama_kegiatan','ormawa.nama as nama_ormawa','jenis_kegiatan','sn')->orderBy(
            'kegiatan_ormawa.id','asc')->paginate(10);
        return view('listkegiatan',['kegiatans' => $data]);
    }
}
