<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonialMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonial_movements', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patrimonial_intervention_type_id')->unsigned()->default(1);
            $table->foreign('patrimonial_intervention_type_id')->references('id')->on('patrimonial_intervention_types');

            $table->integer('patrimonial_id')->unsigned()->default(1);
            $table->foreign('patrimonial_id')->references('id')->on('patrimonials');

            $table->integer('patrimonial_movement_type_id')->unsigned()->default(1);
            $table->foreign('patrimonial_movement_type_id')->references('id')->on('patrimonial_movement_types');

            $table->integer('patrimonial_status_id')->unsigned()->default(1);
            $table->foreign('patrimonial_status_id')->references('id')->on('patrimonial_statuses');
            $table->date('patrimonial_status_date')->nullable();
            
            $table->integer('management_unit_id')->unsigned()->default(1);
            $table->foreign('management_unit_id')->references('id')->on('management_units');

            $table->integer('patrimonial_sector_id')->unsigned()->default(1);
            $table->foreign('patrimonial_sector_id')->references('id')->on('patrimonial_sectors');

            $table->integer('patrimonial_sub_sector_id')->unsigned()->default(1);
            $table->foreign('patrimonial_sub_sector_id')->references('id')->on('patrimonial_sub_sectors');
  
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
        Schema::drop('patrimonial_movements');
    }
}
