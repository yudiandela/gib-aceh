<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ota_id');
            $table->unsignedBigInteger('paskas_id');
            $table->unsignedBigInteger('jumlah');
            $table->enum('type', ['TUNAI', 'BANK']);
            $table->timestamps();

            $table->foreign('ota_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paskas_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
