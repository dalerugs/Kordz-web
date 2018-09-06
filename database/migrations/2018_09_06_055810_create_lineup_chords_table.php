<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineupChordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineup_chords', function (Blueprint $table) {
            $table->string('id',100)->primary();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id',100)->references('id')->on('users');

            $table->string('lineup_id',100)->nullable($value = false);
            $table->foreign('lineup_id')->references('id')->on('lineups');

            $table->string('chord_id',100)->nullable($value = false);
            $table->foreign('chord_id')->references('id')->on('chords');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lineup_chords');
    }
}
