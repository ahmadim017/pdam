<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasibiayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasibiayas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paket');
            $table->integer('id_user');
            $table->bigInteger('hargaterkoreksi')->nullable();
            $table->float('persenhps')->nullable();
            $table->float('nilaiharga')->nullable();
            $table->longText('keterangan')->nullable();
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
        Schema::dropIfExists('evaluasibiayas');
    }
}
