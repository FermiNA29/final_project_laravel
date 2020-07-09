<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipUsersToJawabans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jawabans', function (Blueprint $table) {
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
        Schema::table('jawabans', function (Blueprint $table) {
            $table->dropForeign('jawabans_users_id_foreign');
        });

        Schema::table('jawabans', function (Blueprint $table) {
            $table->dropIndex('jawabans_users_id_foreign');
        });

        Schema::table('jawabans', function (Blueprint $table) {
            $table->integer('users_id')->change();
        });
    }
}
