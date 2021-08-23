<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kegiatan extends Model
{
    use HasFactory;
    use Notifiable;
    public $table = "kegiatan_ormawa";
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_ormawa',
        'nama_kegiatan',
        'jenis_kegiatan',
        'sn',
    ];
}
