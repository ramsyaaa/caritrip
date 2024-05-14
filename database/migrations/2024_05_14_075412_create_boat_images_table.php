<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoatImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_images', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('boat_id')->nullable();
            $table->string('image_name')->nullable();
            $table->text('image_description')->nullable();
            $table->string('key_visual')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boat_images');
    }
}
