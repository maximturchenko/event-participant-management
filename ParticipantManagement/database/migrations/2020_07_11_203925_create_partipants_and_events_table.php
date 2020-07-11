<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartipantsAndEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partipants_and_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participant_id');
            $table->unsignedBigInteger('event_id');
            $table->timestamps();
        });
        Schema::table('partipants_and_events', function (Blueprint $table) {
            $table->foreign('participant_id')->references('id')->on('participants');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partipants_and_events');
    }
}
