<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KegiatanPanitia extends Migration
{
    public function up()
    {
        Schema::create('kegiatan_panitia', function (Blueprint $table) {
            $table->id();
            $table->string('tahap');
            $table->string('nama_kegiatan');
            $table->string('divisi');
            $table->float('sn');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kegiatan_panitia');
    }
}
