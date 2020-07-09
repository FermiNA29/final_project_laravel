<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreteVoteUnvotePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_unvote_pertanyaans', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('users_id');
            $table->unsignedInteger('pertanyaans_id');

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('pertanyaans_id')->references('id')->on('pertanyaans');

            $table->integer('poin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_unvote_pertanyaans');
    }
}
