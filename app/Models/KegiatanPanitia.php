<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class KegiatanPanitia extends Model
{
    use HasFactory;
    use Notifiable;
    public $table = "kegiatan_panitia";
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'tahap',
        'nama_kegiatan',
        'divisi',
        'sn',
    ];
}
