<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipPertanyaansToJawabans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jawabans', function (Blueprint $table) {
            $table->integer('pertanyaan_id')->unsigned()->change();
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaans')
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
            $table->dropForeign('jawabans_pertanyaan_id_foreign');
        });

        Schema::table('jawabans', function (Blueprint $table) {
            $table->dropIndex('jawabans_pertanyaan_id_foreign');
        });

        Schema::table('jawabans', function (Blueprint $table) {
            $table->integer('pertanyaan_id')->change();
        });
    }
}
