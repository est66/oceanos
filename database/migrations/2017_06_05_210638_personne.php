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
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->date('dateDeNaissance');
            $table->string('email');
            $table->string('filiere');
            $table->string('statut');
            $table->text('description');
            $table->timestamps();
                        //CLES ETRANGERES
            //CLE ETRANGERE UTILISATEUR
            $table->string('utilisateur_email');
            $table->foreign('utilisateur_email')->references('utilisateur')->on('email');
            //CLE ETRANGERE ENSEMBLE MEDIA
            $table->date('ensemble_media_edition_date');
            $table->foreign('ensemble_media_edition_date')->references('edition_date')->on('ensemble_media');
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
