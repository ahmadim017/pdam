<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakettendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakettenders', function (Blueprint $table) {
            $table->id();
            $table->string('namakegiatan');
            $table->longText('namapaket');
            $table->bigInteger('pagu');
            $table->bigInteger('hps');
            $table->integer('tahunanggaran');
            $table->longText('lokasi')->nullable();
            $table->string('waktupelaksanaan')->nullable();
            $table->string('klasifikasi');
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
        Schema::dropIfExists('pakettenders');
    }
}
