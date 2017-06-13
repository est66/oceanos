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
            $table->timestamp('date')->nullable();
            $table->text('description')->nullable();
            $table->string('resultats')->nullable();
            $table->string('enjeu')->nullable();
            $table->string('nbBateau')->nullable();
            $table->string('lieu')->nullable();
            $table->boolean('test')->default(false);          
            $table->boolean('archive')->default(false);
            $table->boolean('actif')->default(false);
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
