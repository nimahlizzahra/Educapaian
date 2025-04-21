<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capaians', function (Blueprint $table) {
            $table->id('capaianID');
            $table->unsignedBigInteger('guruID');
            $table->text('deskripsi');
            $table->date('tanggal_capaian')->nullable();
            $table->string('penghargaan')->nullable(); 
            $table->string('kategori_prestasi')->nullable(); // Akademik / Non-Akademik
            $table->string('jenis_capaian')->nullable();
            $table->string('penyelenggara');
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
        Schema::dropIfExists('capaians');
    }
}
