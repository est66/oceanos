<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Personne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            //PAR SOUCIS DE SIMPLIFICATION, L'IDENTIFIANT HYBRIDE EST REMPLACE PAR ID
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('email')->nullable();
            $table->string('statut')->nullable();
            $table->string('phrase')->nullable();
            $table->text('description')->nullable();
            $table->string('filiere')->nullable();
            $table->boolean('archive')->default(false);
            $table->timestamps();
             //CLES ETRANGERES
            //CLE ETRANGERE EDITION
            $table->integer('edition_id');
            $table->foreign('edition_id')->references('id')->on('editions')->onDelete('cascade');  
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnes');
    }
}
