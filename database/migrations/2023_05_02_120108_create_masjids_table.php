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
        Schema::create('masjids', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->year('berdirinya');
            $table->string('namapengurus');
            $table->string('statusmasjid');
            $table->string('alamat');
            $table->bigInteger('luasbangunan');
            $table->bigInteger('dayatampung');
            $table->string('statustanah');
            $table->bigInteger('luastanah');
            $table->string('dana')->default('Tidak Ada');
            $table->float('latitude');
            $table->float('longitude');
            $table->string('geojson');
            $table->string('pembangunan');
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
        Schema::dropIfExists('masjids');
    }
};
