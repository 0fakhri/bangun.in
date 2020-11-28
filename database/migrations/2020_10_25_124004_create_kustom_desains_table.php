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
            $table->unsignedInteger('cv_id');
            $table->foreign('cv_id')->references('id')->on('cv_perencana');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->string('deskripsi',255);
            $table->string('harga',255)->nullable();;
            $table->string('foto',50)->nullable();;
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
