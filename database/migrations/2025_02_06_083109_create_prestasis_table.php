<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id('prestasiID');
            $table->unsignedBigInteger('siswaID')->nullable();
            $table->text('deskripsi');
            $table->date('tanggal_raih_prestasi');
            $table->string('penghargaan')->nullable();
            $table->string('kategori_prestasi')->nullable(); // Akademik / Non-Akademik
            $table->string('jenis_prestasi')->nullable();
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
        Schema::dropIfExists('prestasis');
    }
}
