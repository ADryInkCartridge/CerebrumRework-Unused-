<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nilaiormawa extends Migration
{
    public function up()
    {
       Schema::create('nilai_ormawa', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kegiatan');
            $table->integer('id_mhs');
            $table->float('bn');
            $table->float('tn');
       });
    }
    public function down()
    {
        Schema::dropIfExists('nilai_ormawa');
    }
}
