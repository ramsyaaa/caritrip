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
            $table->foreignId('destination_id');
            $table->string('package_key_visual');
            $table->string('trip_subcategory');
            $table->boolean('have_itenary')->nullable();
            $table->text('itenary_list')->nullable();
            $table->text('include_list')->nullable();
            $table->text('exclude_list')->nullable();
            $table->boolean('is_popular')->nullable();
            $table->text('instagram_post')->nullable();
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
        Schema::drop('boat_travel_packages');
    }
}
