<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonialImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonial_images', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patrimonial_id')->unsigned();
            $table->foreign('patrimonial_id')->references('id')->on('patrimonials')->onDelete('cascade');
            $table->string('extension', 5);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patrimonial_images');
    }
}
