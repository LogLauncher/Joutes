<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) { 
            $table->increments('id'); 
            $table->string('name', 100); 
            $table->integer('tournaments_id')->unsigned(); 
 
            $table->foreign('tournaments_id')->references('id')->on('tournaments'); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams'); 
    }
}
