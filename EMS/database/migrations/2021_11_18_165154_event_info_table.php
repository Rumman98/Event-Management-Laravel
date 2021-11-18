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
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->string('event_time_date');
            $table->string('venue');
            $table->string('registration_fee');
            $table->string('event_edit_count');
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
