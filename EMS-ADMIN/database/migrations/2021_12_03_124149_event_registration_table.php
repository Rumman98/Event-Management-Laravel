<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EventRegistration',function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('user_name');
            $table->string('user_phone_no');
            $table->string('event_name');
            $table->string('event_type');
            $table->string('event_id');
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
