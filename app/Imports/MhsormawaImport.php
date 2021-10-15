<?php

namespace App\Imports;

use App\Models\Mhsormawa;
use App\Models\Mahasiswa;
use App\Models\Ormawa;
use App\Models\Kegiatan;
use App\Models\NilaiOrmawa;
use Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class MhsormawaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $idvalid = preg_replace('/\s+/', '', $row[0]);
        $mhs = Mahasiswa::where('id_cerebrum','=',$idvalid)->first();
        $id = Auth::user()->user_id;
        $ormawa = Ormawa::where('user_id','=',$id)->first();
        
        if($mhs){
            Mhsormawa::create([
                'mahasiswa_id' => $mhs->id,
                'ormawa_id' => $ormawa->id,
            ]);
            $keg = Kegiatan::where('id_ormawa','=',$ormawa->id)->get();
            foreach ($keg as $k){
                
                NilaiOrmawa::create([
                    'id_kegiatan' => $k->id,
                    'id_mhs'=> $mhs->id,
                    'bn'=> 0,
                    'tn'=> 0 * $k->sn,
                ]);
            }

        }
        else return;
    }
}
