<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use App\Exports\MahasiswaExport;
use App\Models\NilaiPanitia;
use App\Models\KegiatanPanitia;
use App\Models\Mahasiswa;
use App\Models\Tahap;
use DB;

class MahasiswaController extends Controller
{
    public function fileImportExport()
    {
       return view('file-import');
    }
    public function listmahasiswa(Request $request)
    {
        if($request->term){
            $data = Mahasiswa::where(function ($query) use ($request) {
                $query->where('id_cerebrum', 'LIKE', '%' . $request->term . '%' )->orWhere('nama', 'LIKE', '%' . $request->term . '%' )->orWhere(
                    'kelompok', 'LIKE', '%' . $request->term . '%' );
                })->paginate(100);
        }
        else{
            $data = Mahasiswa::where(function ($query) use ($request) {
                $query->where('id_cerebrum', 'LIKE', '%' . $request->term . '%' )->orWhere('nama', 'LIKE', '%' . $request->term . '%' )->orWhere(
                    'kelompok', 'LIKE', '%' . $request->term . '%' );
                })->paginate(10);
        }
        return view('listmahasiswa',['listOfMahasiswa' => $data]);
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        if($request->file('file')==NULL)
            return redirect()->back()->withErrors(['Please supply a file with an xslx format']);
        $extension = $request->file('file')->getClientOriginalExtension();
        if($extension!='xlsx')
            return redirect()->back()->withErrors(['File extension needs to be in xlsx format']);
        Excel::import(new MahasiswaImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new MahasiswaExport, 'users-collection.xlsx');
    }

    public function searchMhs(Request $request){
        $request->validate([
            'id_cerebrum' => 'required',
            'tanggal_lahir' => 'required'
        ]);
        $mhs = Mahasiswa::where('id_cerebrum','=',$request->id_cerebrum)->where('tanggal_lahir','=', $request->tanggal_lahir)->first();
        $id = $mhs->id;
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
        
        return view('nilaiMahasiswa',['nilais'=> $nilai,'id'=> $id,'mhs'=>$mhs]);
    }

    public function detailMhs($tahap,$id){
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
        return view('detailmahasiswa',['nilais'=> $nilai]);
    }
}
