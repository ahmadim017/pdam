<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzinusahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izinusahas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_klasifikasi');
            $table->string('jenisizin');
            $table->string('nomorizin');
            $table->date('berlaku');
            $table->string('instansipemberi');
            $table->string('kualifikasi');
            $table->bigInteger('modalusaha');
            $table->string('fileizin');
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
        Schema::dropIfExists('izinusahas');
    }
}
