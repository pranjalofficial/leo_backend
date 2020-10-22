<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblInvoicesOrderRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblInvoicesOrderRelation', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('orderList_id')->unsigned()->index();
            $table->integer('invoice_id')->unsigned()->index();

            $table->timestamps();
            $table->foreign('invoice_id')->references('id')->on('tblInvoices');
            $table->foreign('orderList_id')->references('id')->on('tblOrderList');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
