<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evenement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->unique();
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('description');
            $table->string('lieu');
            $table->timestamps();
            //CLES ETRANGERES
            //CLE ETRANGERE UTILISATEUR
            $table->string('utilisateur_email');
            $table->foreign('utilisateur_email')->references('utilisateur')->on('email');
            //CLE ETRANGERE EDITION
            $table->date('edition_date');
            $table->foreign('edition_date')->references('date')->on('edition');
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
        Schema::dropIfExists('evenement');
    }
}
