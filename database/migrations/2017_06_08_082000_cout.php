<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cout', function (Blueprint $table) {
            //PAR SOUCIS DE SIMPLIFICATION, L'IDENTIFIANT EST REMPLACE PAR ID  
            $table->increments('id');
             //     
            $table->string('nom');
            $table->text('description');            
            $table->integer('montant');
            $table->boolean('archive');
            $table->timestamps();
            //CLES ETRANGERES
            //CLE ETRANGERE BUDGET
            $table->integer('budget_id');
            $table->foreign('budget_id')->references('id')->on('budget')->onDelete('cascade'); 
            //CLE ETRANGERE EQUIPE
            $table->integer('budget_equipe_id');
            $table->foreign('budget_equipe_id')->references('equipe_id')->on('budget')->onDelete('cascade');
            //CLE ETRANGERE DEVISE
            $table->integer('devise_id');
            $table->foreign('devise_id')->references('id')->on('devise')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cout');
    }
}
