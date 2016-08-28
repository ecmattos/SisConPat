<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonials', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patrimonial_type_id')->unsigned()->default(1);
            $table->foreign('patrimonial_type_id')->references('id')->on('patrimonial_types');

            $table->integer('patrimonial_sub_type_id')->unsigned()->default(1);
            $table->foreign('patrimonial_sub_type_id')->references('id')->on('patrimonial_sub_types');

            $table->integer('patrimonial_brand_id')->unsigned()->default(1);
            $table->foreign('patrimonial_brand_id')->references('id')->on('patrimonial_brands');

            $table->integer('patrimonial_model_id')->unsigned()->default(1);
            $table->foreign('patrimonial_model_id')->references('id')->on('patrimonial_models');

            $table->integer('patrimonial_status_id')->unsigned()->default(1);
            $table->foreign('patrimonial_status_id')->references('id')->on('patrimonial_statuses');
            $table->date('patrimonial_status_date')->nullable();

            $table->integer('management_unit_id')->unsigned()->default(1);
            $table->foreign('management_unit_id')->references('id')->on('management_units');

            $table->integer('patrimonial_sector_id')->unsigned()->default(1);
            $table->foreign('patrimonial_sector_id')->references('id')->on('patrimonial_sectors');

            $table->integer('patrimonial_sub_sector_id')->unsigned()->default(1);
            $table->foreign('patrimonial_sub_sector_id')->references('id')->on('patrimonial_sub_sectors');

            $table->integer('provider_id')->unsigned()->default(1);
            $table->foreign('provider_id')->references('id')->on('providers');

            $table->string('code_old', 20)->nullable();
            $table->string('code', 20)->nullable();
            $table->string('description', 200)->nullable();
            $table->string('serial', 25)->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('purchase_process', 25)->nullable();
            $table->string('invoice', 15)->nullable();
            $table->double('purchase_value', 15, 2)->default(0);
            $table->double('purchase_value_current', 15, 2)->default(0);
            $table->double('residual_value', 15, 2)->default(0);
            $table->date('depreciation_date_start')->nullable();
            $table->string('comments', 200)->nullable();
  
            $table->timestamps();
            $table->softDeletes();

            $table->index(['patrimonial_type_id']);
            $table->index(['patrimonial_sub_type_id']);
            $table->index(['patrimonial_brand_id']);
            $table->index(['patrimonial_model_id']);
            $table->index(['patrimonial_status_id']);
            $table->index(['patrimonial_status_date']);
            $table->index(['management_unit_id']);
            $table->index(['patrimonial_sector_id']);
            $table->index(['patrimonial_sub_sector_id']);
            $table->index(['provider_id']);
            $table->index(['code']);
            $table->index(['code_old']);
            $table->index(['description']);
            $table->index(['serial']);
            $table->index(['invoice_date']);
            $table->index(['purchase_process']);
            $table->index(['invoice']); 

            $table->index(['patrimonial_type_id', 'patrimonial_sub_type_id', 'patrimonial_brand_id', 'patrimonial_model_id', 'patrimonial_status_id', 'patrimonial_status_date', 'management_unit_id', 'patrimonial_sector_id', 'patrimonial_sub_sector_id', 'provider_id', 'code', 'code_old', 'description', 'serial'], 'A');

            $table->index(['invoice_date', 'purchase_process', 'invoice'], 'B');

            $table->index(['code', 'code_old'], 'C');

            $table->index(['patrimonial_type_id', 'patrimonial_sub_type_id', 'patrimonial_brand_id', 'patrimonial_model_id', 'patrimonial_status_id', 'patrimonial_status_date'], 'D');

            $table->index(['management_unit_id', 'patrimonial_sector_id', 'patrimonial_sub_sector_id'], 'E');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patrimonials');
    }
}
