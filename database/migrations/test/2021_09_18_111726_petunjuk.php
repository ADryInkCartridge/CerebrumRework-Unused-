<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Petunjuk extends Migration
{
    public function up()
    {
       Schema::create('petunjuk', function (Blueprint $table) {
            $table->id();
            $table->string('file_path');
       });
    }
    public function down()
    {
        Schema::dropIfExists('petunjuk');
    }
}
