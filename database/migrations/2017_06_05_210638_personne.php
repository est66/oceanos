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
        Schema::create('personne', function (Blueprint $table) {
            //PAR SOUCIS DE SIMPLIFICATION, L'IDENTIFIANT HYBRIDE EST REMPLACE PAR ID
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->date('dateDeNaissance');
            $table->string('email')->nullable();
            $table->string('filiere');
            $table->string('statut');
            $table->text('description');
            $table->timestamps();
             //CLES ETRANGERES
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personne');
    }
}
