<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class NilaiOrmawa extends Model
{
    use HasFactory;
    use Notifiable;
    public $table = "nilai_ormawa";
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_kegiatan',
        'id_mhs',
        'bn',
        'tn',
    ];
}
