<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasiakhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasiakhirs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paket');
            $table->integer('id_user');
            $table->bigInteger('nilaiteknis')->nullable();
            $table->float('skorteknis')->nullable();
            $table->float('nilaiharga')->nullable();
            $table->float('skorharga')->nullable();
            $table->float('nilaiakhir')->nullable();
            $table->enum('status',['ya','tidak'])->default('tidak');
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
        Schema::dropIfExists('evaluasiakhirs');
    }
}
