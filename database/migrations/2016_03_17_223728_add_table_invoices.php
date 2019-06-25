<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number')->nullable();
            $table->string('order_form')->nullable();
            $table->text('termes')->nullable();
            $table->text('client_notes')->nullable();
            $table->text('internal_notes')->nullable();
            $table->double('subtotal')->nullable();
            $table->double('total_discount')->nullable();
            $table->double('invoice_total')->nullable();
            $table->double('payed_sum')->nullable();
            $table->string('total_in_chars')->nullable();
            $table->integer('folder_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->dateTime('invoice_date')->nullable();
            $table->dateTime('deadline')->nullable();
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
        Schema::drop('invoices');
    }
}
