<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndanganklarifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undanganklarifikasis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_prosestender');
            $table->integer('id_paket');
            $table->integer('id_user');
            $table->string('nosurat');
            $table->date('tglsurat');
            $table->time('waktumulai');
            $table->time('waktuselesai');
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
        Schema::dropIfExists('undanganverifikasis');
    }
}
