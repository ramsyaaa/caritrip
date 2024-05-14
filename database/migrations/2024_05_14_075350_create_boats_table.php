<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('boat_name')->nullable();
            $table->float('boat_length')->nullable();
            $table->float('boat_width')->nullable();
            $table->float('boat_depth')->nullable();
            $table->string('boat_speed')->nullable();
            $table->integer('boat_year_built')->nullable();
            $table->integer('boat_fuel_capacity')->nullable();
            $table->integer('boat_water_capacity')->nullable();
            $table->string('boat_origin')->nullable();
            $table->string('boat_material')->nullable();
            $table->string('boat_main_engine')->nullable();
            $table->string('boat_dingy')->nullable();
            $table->text('boat_safety_equipment')->nullable();
            $table->text('boat_facility')->nullable();
            $table->integer('boat_capacity')->nullable();
            $table->string('boat_entertainment')->nullable();
            $table->string('boat_featured_image')->nullable();
            $table->text('seo_meta_description')->nullable();
            $table->text('seo_meta_keywords')->nullable();
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
        Schema::drop('boats');
    }
}
