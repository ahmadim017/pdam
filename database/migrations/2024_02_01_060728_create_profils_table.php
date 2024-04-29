<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('npwp')->unique();
            $table->longText('alamat');
            $table->integer('id_provinsi');
            $table->integer('id_kabupaten');
            $table->string('namaperusahaan');
            $table->integer('id_kategori');
            $table->string('email');
            $table->string('notelp');
            $table->enum('kantorcabang',['ya','tidak']);
            $table->string('foto')->nullable();
            $table->string('kodepos')->nullable();
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
        Schema::dropIfExists('profils');
    }
}
