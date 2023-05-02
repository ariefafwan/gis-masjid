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
        Schema::create('pimpinans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('masjid_id')->unsigned();
            $table->foreign('masjid_id')->references('id')->on('masjid')->onDelete('cascade')->onUpdate('cascade');
            $table->string('pimpinan');
            $table->string('jmlhpengurus');
            $table->string('imam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pimpinans');
    }
};