<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {

//
//        Schema::create('users', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('email')->unique();
//            $table->string('password', 60);
//            $table->boolean('confirmed')->default(0);
//            $table->string('confirmation_code')->nullable();
//            $table->rememberToken();
//            $table->timestamps();
//        });
//        Schema::create('books', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->integer('total');
//            $table->integer('sales');
//            $table->boolean('type');
//            $table->boolean('isnew');
//            $table->integer('depart');
//            $table->string('author');
//            $table->integer('price');
//            $table->integer('onsale');
//            $table->text('img');
//            $table->integer('user_id')->unsigned();
//            $table->foreign('user_id')
//                ->references('id')
//                ->on('users')
//                ->onDelete('cascade');
//            $table->timestamps();
//        });
    }

    public function down()
    {
//        Schema::drop('users');
//        Schema::drop('books');
    }
}
