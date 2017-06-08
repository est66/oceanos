<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EquipePersonne extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('equipe_personne', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //CLES ETRANGERES
            //CLE ETRANGERE EQUIPE
            $table->integer('equipe_id');
            $table->foreign('equipe_id')->references('id')->on('equipes')->onDelete('cascade');
            //CLE ETRANGERE PERSONNE
            $table->integer('personne_id');
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('equipe_personne');
    }

}
