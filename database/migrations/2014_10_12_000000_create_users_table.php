<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_login')->unique();
            $table->string('password');
            $table->string('user_nicename')->unique();
            $table->string('user_avatar')->default('img/user/avatar.jpg');
            $table->string('user_email')->unique();
            $table->boolean('user_confirmed')->default('1');
            $table->string('user_slug');
            $table->enum('user_rol',['member','admin'])->default('member');
            $table->string('user_country');
            $table->string('user_gender')->nulleable();
            $table->date('user_birth')->nulleable();
            $table->text('user_about')->nulleable();
            $table->string('user_think')->default('Great! Now im part of this awesome community.');
            $table->boolean('user_pub')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
