<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblOrderList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblOrderList', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('item_id')->unsigned()->index();
            $table->text('item_name');
            $table->double('item_cost');
            $table->double('item_count');
            $table->double('item_total');
            $table->integer('table_id')->unsigned()->index();
            $table->integer('invoice_id')->unsigned()->index();
            $table->integer('branch_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('tblMenu');
            $table->foreign('table_id')->references('id')->on('tblTables');
            $table->foreign('branch_id')->references('id')->on('tblBranch');
            $table->foreign('invoice_id')->references('id')->on('tblInvoices');
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
