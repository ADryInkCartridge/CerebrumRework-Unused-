<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Divisi extends Model
{
    use HasFactory;
    use Notifiable;
    public $table = "divisi";
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nama',
    ];
}
