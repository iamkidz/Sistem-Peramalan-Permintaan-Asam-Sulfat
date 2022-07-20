<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_periode');
            $table->foreign('id_periode')->references('id')->on('periode')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('jumlah_produksi')->default(0);
            $table->integer('jumlah_impor')->default(0);
            $table->integer('jumlah_permintaan')->default(0);
            $table->integer('jumlah_sisa')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan');
    }
};
