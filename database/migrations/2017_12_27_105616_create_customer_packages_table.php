<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_id');
            $table->string('payment_request_id');
            $table->integer('customer_id')->unsigned();
            $table->integer('package_id');
            $table->text('image');
            $table->string('title');
            $table->text('description');
            $table->string('duration');
            $table->string('pricing');
            $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::dropIfExists('customer_packages');
    }
}
