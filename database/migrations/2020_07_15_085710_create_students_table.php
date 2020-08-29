<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('level')->nullable();
            $table->enum('approvement' , ['under_revision' ,'accept','blocked'])->default('under_revision');
            $table->string('block_reason')->nullable();
            $table->string('image')->default('avatar.png')->nullable();
            $table->string('gmail_id')->nullable();
            $table->string('facebook_id')->nullable();
            
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}
