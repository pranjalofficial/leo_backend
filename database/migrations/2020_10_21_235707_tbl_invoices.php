<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblInvoices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->decimal('amount',10,3);
            $table->decimal('discount',10,3);
            $table->decimal('final_amount',10,3);
            $table->integer('branch_id')->unsigned()->index();
            $table->integer('cust_id')->unsigned()->index();
            $table->integer('offer_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('cust_id')->references('id')->on('tblCustomer');
            $table->foreign('offer_id')->references('id')->on('tblOffers');
            $table->foreign('branch_id')->references('id')->on('tblBranch');
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
