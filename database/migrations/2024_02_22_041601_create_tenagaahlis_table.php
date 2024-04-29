<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenagaahlisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenagaahlis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tgllahir');
            $table->enum('jeniskelamin',['Laki-laki','Perempuan']);
            $table->longText('alamat');
            $table->string('pendidikan');
            $table->string('jabatan');
            $table->string('pengalamankerja');
            $table->string('keahlian');
            $table->enum('status',['tetap','tidak tetap']);
            $table->string('dokumen')->nullable();
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
        Schema::dropIfExists('tenagaahlis');
    }
}
