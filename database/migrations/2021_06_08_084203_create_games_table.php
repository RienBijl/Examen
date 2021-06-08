<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('participant_id')->unsigned();
            $table->bigInteger('opponent_id')->unsigned();
            $table->bigInteger('winner_id')->unsigned();
            $table->bigInteger('match_id')->unsigned();
            $table->tinyInteger('result_left')->nullable();
            $table->tinyInteger('result_right')->nullable();

            $table->foreign('participant_id')
                ->references('id')
                ->on('participants')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('opponent_id')
                ->references('id')
                ->on('participants')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('winner_id')
                ->references('id')
                ->on('participants')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('match_id')
                ->references('id')
                ->on('matches')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
