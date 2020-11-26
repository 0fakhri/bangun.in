<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKustomDesainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kustom_desain', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->string('deskripsi',255);
            $table->string('harga',255);
            $table->string('FOTO',50);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kustom_desain');
    }
}
