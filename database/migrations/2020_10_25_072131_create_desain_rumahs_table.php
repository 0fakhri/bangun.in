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
            $table->unsignedInteger('transaksi_id')->nullable();
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->unsignedInteger('cv_id');
            $table->foreign('cv_id')->references('id')->on('cv_perencana');
            $table->string('nama_produk');
            $table->string('foto');
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
