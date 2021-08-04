<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InOrmawa extends Migration
{
    
    public function up()
    {
        Schema::create('in_ormawa', function (Blueprint $table) {
            $table->integer('mahasiswa_id');
            $table->integer('ormawa_id');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('in_ormawa');
    }
}
