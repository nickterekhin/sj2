<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usergroups', function (Blueprint $table) {
            //
            $table->integer("ugroup",true,true);
            $table->string("GroupName",50);
            $table->text("Permissions");
            $table->unique(array("GroupName"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usergroups', function (Blueprint $table) {
            //
            $table->drop();
        });
    }
}
