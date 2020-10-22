<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblAddOns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblAddOns', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->bigInteger('rate');
            $table->integer('menu_item_id')->unsigned()->index();
            $table->integer('branch_id')->unsigned()->index();

            $table->timestamps();

            $table->foreign('menu_item_id')->references('id')->on('tblMenu');
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
