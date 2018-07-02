<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_types', function (Blueprint $table) {
            $table->integer('package_id')->unsigned();
            $table->integer('type_id')->unsigned();

            $table->foreign('package_id')->references('id')->on('packages')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['package_id', 'type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_types');
    }
}
