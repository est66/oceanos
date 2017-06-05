    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Edition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edition', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->unique();
            $table->string('nom');
            $table->text('static_phrase_sponsor');
            $table->string('static_parametre_design');
            $table->timestamps();
            //CLES ETRANGERES
            //CLE ETRANGERE UTILISATEUR
            $table->string('utilisateur_email');
            $table->foreign('utilisateur_email')->references('utilisateur')->on('email');           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edition');
    }
}
