<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallerys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_type_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('summary')->nullable();

            $table->string('image_url')->nullable();
            $table->timestamps();


            $table->foreign('gallery_type_id')->references('id')->on('gallerytypes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallerys');
    }
}
