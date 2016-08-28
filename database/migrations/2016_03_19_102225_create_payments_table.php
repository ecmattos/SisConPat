<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('member_id')->unsigned()->default(1);
            $table->foreign('member_id')->references('id')->on('members');

            $table->date('payment_date')->nullable()->default(null);
            $table->double('payment_year', 4, 0)->default(0);
            $table->double('payment_month', 2, 0)->default(0);
            $table->double('payment_day', 2, 0)->default(0);

            $table->integer('payment_reason_id')->unsigned()->default(1);
            $table->foreign('payment_reason_id')->references('id')->on('payment_reasons');

            $table->integer('payment_method_id')->unsigned()->default(1);
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');

            $table->integer('payment_status_id')->unsigned()->default(1);
            $table->foreign('payment_status_id')->references('id')->on('payment_statuses');

            $table->double('payment_value', 10, 2)->default(0);
            $table->double('payment_value_01', 10, 2)->default(0);
            $table->double('payment_value_02', 10, 2)->default(0);
            $table->double('payment_value_03', 10, 2)->default(0);
            $table->double('payment_value_04', 10, 2)->default(0);
            $table->double('payment_value_05', 10, 2)->default(0);
            $table->double('payment_value_06', 10, 2)->default(0);
            $table->double('payment_value_07', 10, 2)->default(0);
            $table->double('payment_value_08', 10, 2)->default(0);
            $table->double('payment_value_09', 10, 2)->default(0);
            $table->double('payment_value_10', 10, 2)->default(0);
            $table->double('payment_value_11', 10, 2)->default(0);
            $table->double('payment_value_12', 10, 2)->default(0);

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
        Schema::drop('payments');
    }
}
