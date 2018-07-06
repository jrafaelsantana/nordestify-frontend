<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('genre_id');
            $table->unsignedInteger('artist_id');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->string('id_spotify');
            $table->double('danceability');
            $table->double('energy');
            $table->double('loudness');
            $table->double('speechiness');
            $table->double('acousticness');
            $table->double('instrumentalness');
            $table->double('liveness');
            $table->double('valence');
            $table->double('tempo');
            $table->integer('duration_ms');
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
        Schema::dropIfExists('musics');
    }
}
