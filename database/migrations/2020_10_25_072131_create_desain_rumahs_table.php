<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesainRumahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desain_rumah', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->unsignedInteger('cv_id');
            $table->foreign('cv_id')->references('id')->on('cv_perencana');
            $table->string('panjang');
            $table->string('lebar');
            $table->string('tinggi');
            $table->string('jumlah_kamar_tidur');
            $table->string('jumlah_kamar_mandi');
            $table->string('harga');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desain_rumah');
    }
}
