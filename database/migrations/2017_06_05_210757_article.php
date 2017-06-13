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
            $table->string('titre')->nullable();
            $table->string('soustitre')->nullable();
            $table->string('type')->nullable();
            $table->string('auteur')->nullable();
            $table->timestamp('date')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->boolean('visible')->default(true);
            $table->boolean('archive')->default(false);           
            $table->timestamps();
            //CLES ETRANGERES
            //CLE ETRANGERE EDITION
            $table->integer('edition_id')->nullable();
            $table->foreign('edition_id')->references('id')->on('editions')->onDelete('cascade');
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
        Schema::dropIfExists('articles');
    }
}
