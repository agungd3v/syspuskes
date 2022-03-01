<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanApotiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_apotiks', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('obat_id');
            $table->string('nama_pasien');
            $table->integer('jumlah');
            $table->string('dosis');
            $table->timestamps();

            $table->foreign('obat_id')->references('id')->on('obats')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_apotiks');
    }
}
