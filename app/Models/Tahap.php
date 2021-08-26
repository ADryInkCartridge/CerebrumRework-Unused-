<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tahap extends Model
{
    use HasFactory;
    use Notifiable;
    public $table = "tahap";
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nama',
        'status',
        'tipe',
    ];
}