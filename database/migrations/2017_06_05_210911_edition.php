<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Edition extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('editions', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date');
            $table->string('description');
            $table->string('resultats');
            $table->string('enjeu');
            $table->string('nbBateau');
            $table->string('lieu');
            $table->boolean('test');            
            $table->boolean('archive');
            $table->boolean('actif');
            $table->timestamps();
            //CLES ETRANGERES
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('editions');
    }

}
