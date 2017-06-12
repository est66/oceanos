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
            $table->string('nom');
            $table->datetime('date')->nullable();
            $table->text('description');
            $table->text('resultats')->nullable();
            $table->text('enjeu');
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
