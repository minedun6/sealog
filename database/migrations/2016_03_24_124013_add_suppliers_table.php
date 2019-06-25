<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('matricule_fiscale')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('notes')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_name')->nullable();
            $table->text('payment_condition')->nullable();
            $table->integer('parameter_id')->nullable();
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
        Schema::drop('suppliers');
    }
}
