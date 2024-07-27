<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boat_travel_package_id');
            $table->foreignId('cabin_id');
            $table->string('duration');
            $table->string('price');
            $table->string('unit');
            $table->string('extra_bed_price')->nullable();
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
        Schema::dropIfExists('open_trips');
    }
}
