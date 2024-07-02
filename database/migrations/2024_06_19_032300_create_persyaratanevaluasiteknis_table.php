<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersyaratanevaluasiteknisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persyaratanevaluasiteknis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paket');
            $table->integer('id_user');
            $table->integer('id_evaluasiteknis');
            $table->integer('bobot');
            $table->enum('status',['ya','tidak','null'])->default('null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persyaratanevaluasiteknis');
    }
}
