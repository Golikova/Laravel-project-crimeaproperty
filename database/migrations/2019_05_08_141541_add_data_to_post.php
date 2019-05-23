<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataToPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function($table){
            $table->integer('type_id');
            $table->string('price');
            $table->string('city');
            $table->string('street');
            $table->string('house');
            $table->string('apartment');
            $table->string('square');
            $table->string('mobile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function($table){
            $table->dropColumn('type_id');
            $table->dropColumn('price');
            $table->dropColumn('city');
            $table->dropColumn('street');
            $table->dropColumn('house');
            $table->dropColumn('apartment');
            $table->dropColumn('square');
            $table->dropColumn('mobile');
        });
    }
}
