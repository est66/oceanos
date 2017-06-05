<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Equipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('type');
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
        Schema::dropIfExists('equipe');
    }
}
