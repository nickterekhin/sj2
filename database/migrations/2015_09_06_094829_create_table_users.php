<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //
            $table->integer("uid",true,true);
            $table->integer("ugroup");
            $table->string("FirstName",30);
            $table->string("LastName",30);
            $table->string("UserName",20);
            $table->string("email",50);
            $table->string("Password",100);
            $table->boolean("Active")->default(1);
            $table->integer("RegData");
            $table->rememberToken();
            $table->timestamps();
            $table->unique(array("email","UserName"));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->drop();
        });
    }
}
