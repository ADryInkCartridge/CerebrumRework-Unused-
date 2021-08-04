<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KegiatanOrmawa extends Migration
{
    public function up()
    {
       Schema::create('kegiatan_ormawa', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ormawa');
            $table->string('nama_kegiatan');
            $table->string('jenis_kegiatan');
            $table->float('sn');
       });
    }
    public function down()
    {
        Schema::dropIfExists('kegiatan_ormawa');
    }
}
