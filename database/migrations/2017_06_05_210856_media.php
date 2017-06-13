<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Media extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            //PAR SOUCIS DE SIMPLIFICATION, L'IDENTIFIANT EST REMPLACE PAR ID
            $table->increments('id');
            $table->string('titre');
            $table->string('url');            
            $table->text('description');
            $table->string('type');
            $table->integer('position')->nullable();
            $table->boolean('archive')->default(false);
            $table->timestamps();
             //CLES ETRANGERES            
            //PAR SOUCIS DE SIMPLIFICATION, L'IDENTIFIANT EST REMPLACE PAR ID
            //CLE ETRANGERE EQUIPE
            $table->integer('equipe_id')->nullable();      
            $table->foreign('equipe_id')->references('id')->on('equipes')->onDelete('cascade');
            //CLE ETRANGERE PERSONNE
            $table->integer('personne_id')->nullable(); 
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade'); 
            //CLE ETRANGERE ARTICLE
            $table->integer('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');  
            //CLE ETRANGERE SPONSOR
            $table->integer('sponsor_id')->nullable();
            $table->foreign('sponsor_id')->references('id')->on('sponsors')->onDelete('cascade');  
            //CLE ETRANGERE ALBUM
            $table->integer('album_id')->nullable();
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            //CLE ETRANGERE INFOMRATION
            $table->integer('information_id')->nullable();
            $table->foreign('information_id')->references('id')->on('informations')->onDelete('cascade');
            //CLE ETRANGERE PRESSE
            $table->integer('presse_id')->nullable();
            $table->foreign('presse_id')->references('id')->on('presses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medias');
    }
}
