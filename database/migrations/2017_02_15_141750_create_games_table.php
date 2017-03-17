<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) { 
 
            $table->increments('id');
            $table->integer('score_contender1'); 
            $table->integer('score_contender2');
            $table->date('date');
            $table->time('start_time'); 
            $table->integer('contender1_id')->unsigned(); 
            $table->integer('contender2_id')->unsigned();  
            $table->integer('court_id')->unsigned(); 

            $table->foreign('contender1_id')->references('id')->on('contenders'); 
            $table->foreign('contender2_id')->references('id')->on('contenders'); 
            $table->foreign('court_id')->references('id')->on('courts'); 

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('games');
    }
}