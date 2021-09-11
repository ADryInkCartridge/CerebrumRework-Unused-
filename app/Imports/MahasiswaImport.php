<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $unixDate = ($row[1] - 25569) * 86400;
        $date =  gmdate("d/m/Y", $unixDate);
            return new Mahasiswa([
            'id_cerebrum' => $row[0],
            'tanggal_lahir' => $date,
            'nama' => $row[2],
            'kelompok' => $row[3],
        ]);
    }
}
