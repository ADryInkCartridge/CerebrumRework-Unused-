<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Model
{
    use HasFactory;
    use Notifiable;
    public $table = "mahasiswa";
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_cerebrum',
        'nama',
        'kelompok',
    ];

}
