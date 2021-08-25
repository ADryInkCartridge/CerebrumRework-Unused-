<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tahap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahap', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('status');
            $table->integer('tipe');
       });
    }
    public function down()
    {
        Schema::dropIfExists('tahap');
    }
}
