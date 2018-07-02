<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_guide', function (Blueprint $table) {
            $table->integer('type_id')->unsigned();
            $table->integer('guide_id')->unsigned();

            $table->foreign('type_id')->references('id')->on('types')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guide_id')->references('id')->on('guides')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['type_id', 'guide_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_guide');
    }
}
