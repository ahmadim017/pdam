<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktapendiriansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktapendirians', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->date('tglsurat');
            $table->string('notaris');
            $table->string('lokasi');
            $table->string('file');
            $table->bigInteger('modal');
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
        Schema::dropIfExists('aktapendirians');
    }
}
