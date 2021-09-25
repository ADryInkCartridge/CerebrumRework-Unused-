<?php

namespace App\Imports;

use App\Models\Mhsormawa;
use App\Models\Mahasiswa;
use App\Models\Ormawa;
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
            return new Mhsormawa([
                'mahasiswa_id' => $mhs->id,
                'ormawa_id' => $ormawa->id,
            ]);
        }
        else return;
    }
}
