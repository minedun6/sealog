<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('folder_id')->nullable();
            $table->integer('payment_type_id')->nullable();
            $table->double('amount')->nullable();
            $table->double('exchange_rate')->nullable();
            $table->double('amount_exchanged')->nullable();
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
        Schema::drop('charges');
    }
}
