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
        Schema::create('articles', function (Blueprint $table) {
            //PAR SOUCIS DE SIMPLIFICATION, L'IDENTIFIANT HYBRIDE EST REMPLACE PAR ID
            $table->increments('id');
            $table->string('titre');
            $table->string('soustitre')->nullable();
            $table->string('type');
            $table->string('auteur')->nullable();
            $table->datetime('date');
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->boolean('visible');
            $table->boolean('archive');            
            $table->timestamps();
            //CLES ETRANGERES
            //CLE ETRANGERE EDITION
            $table->integer('edition_id');
            $table->foreign('edition_id')->references('id')->on('editions')->onDelete('cascade');
            //CLE ETRANGERE PRESSE
            $table->integer('presse_id');
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
        Schema::dropIfExists('articles');
    }
}
