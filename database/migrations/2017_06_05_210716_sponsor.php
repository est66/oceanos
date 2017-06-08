<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sponsor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            //PAR SOUCIS DE SIMPLIFICATION, L'IDENTIFIANT EST REMPLACE PAR ID
            $table->increments('id');
            $table->string('nom');
            $table->string('categorie');
            $table->text('description');
            $table->string('url');
            $table->boolean('archive');
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
        Schema::dropIfExists('sponsors');
    }
}
