<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->string('terrain_code'); //  TER00001
            $table->string('terrain_etat')->nullable(); //  lotissement, quartier, zone villa, agricole
            $table->string('terrain_facade')->nullable();   // Rue, Place, Piscine, Sur Mer
            $table->string('terrain_situation')->nullable(); // titre/milikia/contrat/miftah/contrat adlia
            $table->string('surface')->nullable();
            $table->string('terrain_etage')->nullable(); // RDC/1/2/3/4
            $table->string('terrain_recule')->nullable(); // garage/RDC/Sous Sol/Mezzanine
            $table->integer('terrain_garage_hauteur')->default(0)->nullable();
            $table->integer('prix_metre')->default(0)->nullable();
            $table->integer('prix_total')->default(0)->nullable();
            $table->integer('prix_declaration')->default(0)->nullable();
            $table->string('description')->nullable();
            $table->integer('client_id');
            $table->integer('city_id');
            $table->integer('city_sector_id');
            $table->integer('intermediaire_id');
            $table->integer('terrain_service_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terrains');
    }
}
