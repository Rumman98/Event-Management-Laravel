<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserHostTable',function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('password');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->string('photo_location');
            $table->string('user_type');
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
