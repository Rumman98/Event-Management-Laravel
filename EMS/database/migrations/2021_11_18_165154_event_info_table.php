<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EventInfoTable',function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('event_name');
            $table->string('event_description');
            $table->string('event_type');
            $table->string('event_time');
            $table->string('event_date');
            $table->string('event_venue');
            $table->string('event_registration_fee');
            $table->string('event_reg_last_date');
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
