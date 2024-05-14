<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoatTravelTripImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_travel_trip_images', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('package_id')->nullable();
            $table->integer('trip_id')->nullable();
            $table->text('images')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boat_travel_trip_images');
    }
}
