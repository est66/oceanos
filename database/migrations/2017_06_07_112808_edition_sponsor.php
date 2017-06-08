<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditionSponsor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edition_sponsor', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //CLES ETRANGERES
            //CLE ETRANGERE EDITION
            $table->integer('edition_id');
            $table->foreign('edition_id')->references('id')->on('editions')->onDelete('cascade'); 
            //CLE ETRANGERE EQUIPE
            $table->integer('sponsor_id');
            $table->foreign('sponsor_id')->references('id')->on('sponsors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edition_sponsor');
    }
}
