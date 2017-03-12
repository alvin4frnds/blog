<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            
            $table->string('first_name', '40');
            $table->string('last_name', '40');
            $table->timestamp('birthday');
            $table->string('cover_pic')->nullable();
            $table->string('profile_pic')->nullable();
            $table->text('religion')->nullable();
            $table->text('about_me')->nullable();
            $table->string('favorites')->nullable();
            $table->string('gender', 1)->default('M');
            
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_info');
    }
}
