<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblBranch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblBranch', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('address_line');
            $table->string('city');
            $table->string('state');
            $table->bigInteger('pincode');
            $table->integer('rest_id')->unsigned()->index();

            $table->decimal('latitude',10,8);
            $table->decimal('longitude',11,8);
            $table->timestamps();

            $table->foreign('rest_id')->references('id')->on('tblRestaurants');
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
