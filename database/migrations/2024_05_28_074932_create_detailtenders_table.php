<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailtendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailtenders', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paket');
            $table->integer('id_metodepengadaan');
            $table->enum('jenistender',['terbuka','tertutup']);
            $table->string('bapembukaanpenawaran')->nullable();
            $table->date('tglpembukaanpenawaran')->nullable();
            $table->integer('created_by');
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
        Schema::dropIfExists('detailtenders');
    }
}
