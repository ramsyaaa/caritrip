<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('page_title')->nullable();
            $table->string('page_breadcrumbs_title')->nullable();
            $table->string('page_og_image')->nullable();
            $table->string('page_banner_image')->nullable();
            $table->text('page_meta_description')->nullable();
            $table->string('page_friendly_url')->nullable();
            $table->text('page_meta_keywords')->nullable();
            $table->string('page_category');
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
        Schema::drop('pages');
    }
}
