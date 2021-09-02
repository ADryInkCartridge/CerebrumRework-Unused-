<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Panitia extends Migration
{
    public function up()
    {
        Schema::create('panitia', function (Blueprint $table) {
            $table->id();
            $table->string('kelompok');
            $table->string('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('panitia');
    }
}
