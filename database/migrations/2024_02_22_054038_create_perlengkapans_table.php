<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerlengkapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perlengkapans', function (Blueprint $table) {
            $table->id();
            $table->string('namalat');
            $table->integer('jumlah');
            $table->string('tipe');
            $table->longText('spesifikasi');
            $table->string('status');
            $table->string('kondisi');
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
        Schema::dropIfExists('perlengkapans');
    }
}
