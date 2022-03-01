<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat_masuks', function (Blueprint $table) {
          $table->integer('id')->autoIncrement();
          $table->integer('obat_id');
          $table->integer('sumber_id');
          $table->integer('jumlah');
          $table->timestamps();

          $table->foreign('obat_id')->references('id')->on('obats')->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('sumber_id')->references('id')->on('sumber_obat_masuks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat_masuks');
    }
}
