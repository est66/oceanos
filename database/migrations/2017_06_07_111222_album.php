<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Album extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->text('description');
            $table->integer('position')->nullable();;
            $table->boolean('archive');
            $table->timestamps();
            //CLES ETRANGERES
            //CLE ETRANGERE EDITION
            $table->integer('edition_id')->unsigned();
            $table->foreign('edition_id')->references('id')->on('editions')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('albums');
    }

}
