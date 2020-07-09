<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipUsersToPertanyaans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pertanyaans', function (Blueprint $table) {
            $table->integer('users_id')->unsigned()->change();
            $table->foreign('users_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pertanyaans', function (Blueprint $table) {
            $table->dropForeign('pertanyaans_users_id_foreign');
        });

        Schema::table('pertanyaans', function (Blueprint $table) {
            $table->dropIndex('pertanyaans_users_id_foreign');
        });

        Schema::table('pertanyaans', function (Blueprint $table) {
            $table->integer('users_id')->change();
        });
    }
}
