<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Panitia extends Model
{
    use HasFactory;
    use Notifiable;
    public $table = "panitia";
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'kelompok',
        'user_id',
    ];

}
