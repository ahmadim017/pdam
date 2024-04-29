<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrasis', function (Blueprint $table) {
            $table->id();
            $table->string('npwp');
            $table->string('nama');
            $table->string('nohp');
            $table->string('telpon');
            $table->string('email');
            $table->integer('id_badanusaha');
            $table->longText('alamat');
            $table->integer('id_provinsi');
            $table->integer('id_kabuapten');
            $table->string('nopkp');
            $table->string('filenpwp');
            $table->string('filepkp');
            $table->string('web')->nullable();
            $table->string('kodepos')->nullable();
            $table->enum('kantorcabang',['ya','tidak']);
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
        Schema::dropIfExists('administrasis');
    }
}
