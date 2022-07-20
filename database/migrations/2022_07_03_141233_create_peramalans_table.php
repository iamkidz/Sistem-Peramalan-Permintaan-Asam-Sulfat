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
        Schema::create('peramalan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_periode');
            $table->foreign('id_periode')->references('id')->on('periode')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('id_permintaan');
            $table->foreign('id_permintaan')->references('id')->on('permintaan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->double('permintaan');
            $table->double('peramalan')->nullable();
            $table->double('error')->nullable();
            $table->double('mad')->nullable();
            $table->double('mse')->nullable();
            $table->double('mape')->nullable();
            $table->double('bulan_depan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peramalan');
    }
};
