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
            'nilai_ormawa.id_kegiatan','=',$id)->select('nilai_ormawa.*','mahasiswa.id_cerebrum','mahasiswa.nama')->orderBy('nilai_ormawa.id_mhs','asc')->paginate(10);
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
        $userid = Auth::user()->user_id;
        $data = Ormawa::where('user_id',$userid)->get();
        $tahap = Tahap::where([['status','=','1'],['tipe','=','1']])->get();
        return view('editkegiatan',['id'=> $id,'kegiatan' => $Kegiatan,'ormawas'=> $data,'tahaps' => $tahap]);
    }

    public function updateNilaiOrmawa(Request $request)
    {
        $nil = NilaiOrmawa::where('id','=',$request->id)->first();
        $keg = Kegiatan::where('id','=',$nil->id_kegiatan)->first();
        $sn = $keg->sn;
        $request->validate([
            'id' => 'required',
            'bn'=> 'required',
        ]);
        NilaiOrmawa::where('id',$request->id)->update([
            'bn'=> $request['bn'],
            'tn'=> $request['bn'] * $sn,
        ]);

        return redirect()->route('nilaiOrmawa',[$keg->id]);
    }

    public function tambahKegiatan()
    {
        $userid = Auth::user()->user_id;
        $data = Ormawa::where('user_id',$userid)->get();
        $tahap = Tahap::where([['status','=','1'],['tipe','=','1']])->get();
        return view('tambahkegiatan',['ormawas'=> $data,'tahaps' => $tahap]);
    }

    public function editNilaiOrmawa($id){
        $nilai = NilaiOrmawa::join('mahasiswa','mahasiswa.id','=','nilai_ormawa.id_mhs')->join(
            'kegiatan_ormawa','kegiatan_ormawa.id','=','nilai_ormawa.id_kegiatan')->join(
                'tahap','tahap.id','=','kegiatan_ormawa.jenis_kegiatan')->where(
                'nilai_ormawa.id','=',$id)->select(
            'nilai_ormawa.*','mahasiswa.nama','mahasiswa.id_cerebrum','tahap.nama as tahap'
        )->first();
        return view('editnilaiormawa',['nilai'=>$nilai]);
    }
    public function addKegiatan(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'id_ormawa' => 'required',
            'jenis_kegiatan' => 'required',
            'sn' => 'required',
        ]);
        $keg = Kegiatan::create([
            'nama_kegiatan' => $request['nama_kegiatan'],
            'id_ormawa' => $request['id_ormawa'],
            'jenis_kegiatan' => $request['jenis_kegiatan'],
            'sn' => $request['sn'],
        ]);
        $sn = $keg->sn;
        $mhs = Mahasiswa::join('in_ormawa','mahasiswa.id','=','in_ormawa.mahasiswa_id')->where('ormawa_id','=',$request->id_ormawa)->get();
        foreach($mhs as $m){
            NilaiOrmawa::create([
                'id_kegiatan' => $keg->id,
                'id_mhs'=> $m->mahasiswa_id,
                'bn'=> 0,
                'tn'=> 0 * $sn,
            ]);
        }
        return redirect()->route('tambahkegiatan')->with('success', 'Kegiatan Berhasil Ditambahkan');
    }

    public function updateNilai(Request $request)
    {
        $nil = NilaiOrmawa::where('id','=',$request->id)->first();
        $keg = Kegiatan::where('id','=',$nil->id_kegiatan)->first();
        $sn = $keg->sn;
        $request->validate([
            'id' => 'required',
            'bn'=> 'required',
        ]);
        NilaiOrmawa::where('id',$request->id)->update([
            'bn'=> $request['bn'],
            'tn'=> $request['bn'] * $sn,
        ]);

        return redirect()->route('nilaiOrmawa',[$keg->id]);
    }
    public function deleteNilai(Request $request){
    
        $id = $request['id'];
		if (NilaiOrmawa::where('id', '=', $id)->exists()) {
            $Ormawa = NilaiOrmawa::where('id',$id)->delete();
            return redirect()->route('nilaiOrmawa',[$request->id_kegiatan])->with('success', 'Ormawa Berhasil Dihapus');
        }
		return redirect('nilaiOrmawa',[$request->id_kegiatan])->withErrors('Ormawa tidak ditemukan');
    }

    public function updatekegiatan(Request $request){
        $request->validate([
            'nama_kegiatan' => 'required',
            'id_ormawa' => 'required',
            'jenis_kegiatan' => 'required',
            'sn' => 'required',
        ]);
        Kegiatan::where('id',$request->id)->update([
			'nama_kegiatan' => $request['nama_kegiatan'],
            'id_ormawa' => $request['id_ormawa'],
            'jenis_kegiatan' => $request['jenis_kegiatan'],
            'sn' => $request['sn'],
		]);
        $Nilai = NilaiOrmawa::where('id_kegiatan',$request->id)->get();
        foreach($Nilai as $n){
            NilaiOrmawa::where('id','=',$n->id)->update([
                'tn' => $request['sn'] * $n->bn
            ]);
        }
        return redirect()->route('kegiatanpanitia.edit', [$request->id])->with('success', 'Kegiatan Berhasil Diupdate');
    }
    
    public function deleteKegiatan(Request $request)
    {
        $id = $request['id'];
		if (Kegiatan::where('id', '=', $id)->exists()) {
            $Panitia = Kegiatan::where('id',$id)->delete();
            $Nilai = NilaiOrmawa::where('id_kegiatan',$id)->delete();
            return redirect()->route('listkegiatan')->with('success', 'Kegiatan Berhasil Dihapus');
        }
		return redirect('listkegiatan')->withErrors('Kegiatan tidak ditemukan');
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
