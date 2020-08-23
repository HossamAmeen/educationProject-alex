<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('live_comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment')->nullable();
            $table->string('user_name')->nullable();
            $table->string('type')->nullable();

            $table->bigInteger('live_id')->unsigned()->nullable();
            $table->foreign('live_id')->references('id')->on('room_lives')->onDelete('set null');
            $table->bigInteger('person_id')->unsigned()->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live_comments');
    }
}
