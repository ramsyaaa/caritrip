<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoatTravelPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_travel_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('package_name')->nullable();
            $table->integer('boat_id')->nullable();
            $table->string('package_key_visual')->nullable();
            $table->text('package_short_description')->nullable();
            $table->text('package_description')->nullable();
            $table->string('location')->nullable();
            $table->boolean('have_itenary')->nullable();
            $table->text('itenary_list')->nullable();
            $table->text('include_list')->nullable();
            $table->text('exclude_list')->nullable();
            $table->text('seo_meta_description')->nullable();
            $table->text('seo_meta_keywords')->nullable();
            $table->string('highlight_video')->nullable();
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
        Schema::drop('boat_travel_packages');
    }
}
