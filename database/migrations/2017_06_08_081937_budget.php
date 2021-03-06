<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Budget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            //PAR SOUCIS DE SIMPLIFICATION, L'IDENTIFIANT EST REMPLACE PAR ID
            $table->increments('id');           
            $table->string('nom');            
            $table->integer('montant_recolte');
            $table->boolean('montant_manquant_visible')->default(true);;;
            $table->boolean('graph_visible')->default(true);;
            $table->boolean('archive')->default(false);
            $table->timestamps();
            //CLES ETRANGERES
            //CLE ETRANGERE EQUIPE
            $table->integer('equipe_id')->unsigned();
            $table->foreign('equipe_id')->references('id')->on('equipes')->onDelete('cascade'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budgets');
    }
}
