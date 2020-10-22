<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMenu', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('item_name');
            $table->text('item_description');
            $table->double('item_rate');
            $table->string('item_img');
            $table->integer('menu_category_id')->unsigned()->index();
            $table->integer('branch_id')->unsigned()->index();

            $table->timestamps();

            $table->foreign('menu_category_id')->references('id')->on('tblMenuCategory');
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
