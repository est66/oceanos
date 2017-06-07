<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            //PAR SOUCIS DE SIMPLIFICATION, L'IDENTIFIANT HYBRIDE EST REMPLACE PAR ID
            $table->increments('id');
            $table->string('titre');
            $table->string('soustitre');
            $table->string('type');
            $table->string('auteur');
            $table->datetime('date');
            $table->text('description');
            $table->boolean('visible');
            $table->boolean('archive');            
            $table->timestamps();
            //CLES ETRANGERES
            //CLE ETRANGERE EDITION
            $table->integer('edition_id');
            $table->foreign('edition_id')->references('id')->on('edition')->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
