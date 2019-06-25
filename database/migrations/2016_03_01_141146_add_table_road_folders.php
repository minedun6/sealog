<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableRoadFolders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('road_folders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('landing_place')->nullable();
            $table->string('shipment_place')->nullable();
            $table->string('truck')->nullable();
            $table->string('cma_number')->nullable();
            $table->integer('folder_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('road_folders');
    }
}
