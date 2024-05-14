<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoatTravelTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_travel_trips', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('package_id')->nullable();
            $table->string('trip_category');
            $table->string('trip_subcategory');
            $table->string('trip_name')->nullable();
            $table->string('trip_days')->nullable();
            $table->integer('trip_price')->nullable();
            $table->string('trip_note')->nullable();
            $table->integer('language_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boat_travel_trips');
    }
}
