<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanpenyediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuanpenyedias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->nullable();
            $table->integer('id_profil')->nullable();
            $table->integer('id_berkas')->nullable();
            $table->enum('status',['verifikasi','diterima','ditolak']);
            $table->enum('konfirmasi',['ya','tidak']);
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
        Schema::dropIfExists('pengajuanpenyedias');
    }
}
