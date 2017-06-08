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
        Schema::create('media', function (Blueprint $table) {
            //PAR SOUCIS DE SIMPLIFICATION, L'IDENTIFIANT EST REMPLACE PAR ID
            $table->increments('id');
            $table->string('titre');
            $table->string('url');            
            $table->text('description');
            $table->string('type');
            $table->integer('position');
            $table->boolean('archive');
            $table->timestamps();
             //CLES ETRANGERES            
            //PAR SOUCIS DE SIMPLIFICATION, L'IDENTIFIANT EST REMPLACE PAR ID
            //CLE ETRANGERE EQUIPE
            $table->integer('equipe_id')->nullable();           
            $table->foreign('equipe_id')->references('id')->on('equipe')->onDelete('cascade');
            //CLE ETRANGERE PERSONNE
            $table->integer('personne_id')->nullable();
            $table->foreign('personne_id')->references('id')->on('personne')->onDelete('cascade'); 
            //CLE ETRANGERE ARTICLE
            $table->integer('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('article')->onDelete('cascade');  
            //CLE ETRANGERE SPONSOR
            $table->date('sponsor_id')->nullable();
            $table->foreign('sponsor_id')->references('id')->on('sponsor')->onDelete('cascade');  
            //CLE ETRANGERE ALBUM
            $table->date('album_id')->nullable();
            $table->foreign('album_id')->references('id')->on('album')->onDelete('cascade');
            //CLE ETRANGERE INFOMRATION
            $table->date('information_id')->nullable();
            $table->foreign('information_id')->references('id')->on('information')->onDelete('cascade');
            //CLE ETRANGERE PRESSE
            $table->integer('presse_id');
            $table->foreign('presse_id')->references('id')->on('presse')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
