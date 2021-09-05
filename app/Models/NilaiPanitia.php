<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class NilaiPanitia extends Model
{
    use HasFactory;
    use Notifiable;
    public $table = "nilai_panitia";
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_kegiatan',
        'id_mhs',
        'bn',
        'tn',
    ];
}
