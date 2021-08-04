<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ormawa extends Migration
{
    public function up()
    {
        Schema::create('ormawa', function (Blueprint $table) {
            $table->id();
            $table->string('ormawa_name');
            $table->string('ormawa_desc');
        });
    }
    public function down()
    {
        Schema::dropIfExists('ormawa');
    }
}
