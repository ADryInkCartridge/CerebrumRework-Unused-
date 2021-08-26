<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mhsormawa extends Model
{
    use HasFactory;
    use Notifiable;
    public $table = "in_ormawa";
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'mahasiswa_id',
        'ormawa_id',
    ];
}
