<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ormawa extends Model
{
    use HasFactory;
    use Notifiable;
    public $table = "ormawa";
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nama',
        'user_id',
    ];

}
