<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('invoice_id');
            $table->foreignId('client_id')->references('id')->on('users');
            $table->text('matter');
            $table->foreignId('issuer_id')->references('id')->on('users');
            $table->foreignId('currency_id')->references('id')->on('currencies');
            $table->bigInteger('invoice_no');
            $table->date('issuing_date');
            $table->text('description');
            $table->decimal('price', 9, 2);
            $table->text('file_location');
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
        Schema::dropIfExists('invoices');
    }
}
