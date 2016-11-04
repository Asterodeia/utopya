<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->text('texte');

            $table->integer('auteur_id')->unsigned();
            $table->foreign('auteur_id')->references('id')->on('persos');
            
            $table->integer('chapitre_id')->unsigned();
            $table->foreign('chapitre_id')->references('id')->on('chapitres');

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
        Schema::dropIfExists('posts');
    }
}
