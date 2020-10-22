<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblEmployee', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('mobile_no');
            $table->string('email_id')->unique()->nullable();
            $table->string('role');
            $table->bigInteger('password');
            $table->integer('branch_id')->unsigned()->index();

            $table->timestamps();
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
