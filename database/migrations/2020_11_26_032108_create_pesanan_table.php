<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('cv_id');
            $table->foreign('cv_id')->references('id')->on('cv_perencana');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->string('nama_customer');
            $table->string('nama_produk_design');
            $table->string('no_tlp');
            $table->string('email');
            $table->string('variasi_produk')->nullable();
            $table->string('harga_produk')->nullable();
            $table->enum('status', ['Ya','Tidak'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
