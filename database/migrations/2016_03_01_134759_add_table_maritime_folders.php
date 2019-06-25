<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableMaritimeFolders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('martime_folders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('landing_place')->nullable();
            $table->string('shipment_place')->nullable();
            $table->string('bl_number')->nullable();
            $table->string('ship')->nullable();
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
        Schema::drop('martime_folders');
    }
}
