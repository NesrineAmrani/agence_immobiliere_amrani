<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villas', function (Blueprint $table) {
            $table->id();
            $table->string('villa_code'); //  APP00001
            $table->string('villa_facade')->nullable();   // Rue, Patio, Place, Piscine, Sur Mer
            $table->string('villa_situation')->nullable(); 
            $table->string('villa_etat')->nullable(); //  neuf/occupe
            $table->string('villa_surface_total')->nullable();
            $table->string('villa_surface_batie')->nullable();
            $table->string('nbr_garage')->nullable();
            $table->string('surface_jardin')->nullable();
            $table->string('surface_patio')->nullable();
            $table->string('nbr_etages')->nullable();
            $table->string('villa_details')->nullable();   // Rue, Patio, Place, Piscine, Sur Mer
            $table->integer('largeur_1')->default(0)->nullable();
            $table->integer('largeur_2')->default(0)->nullable();
            $table->integer('largeur_3')->default(0)->nullable();
            $table->string('activite')->nullable();
            $table->string('description')->nullable();
            $table->integer('prix_metre')->default(0)->nullable();
            $table->integer('prix_total')->default(0)->nullable();
            $table->integer('prix_declaration')->default(0)->nullable();
            $table->integer('client_id');
            $table->integer('city_id');
            $table->integer('city_sector_id');
            $table->integer('intermediaire_id');
            $table->integer('villa_service_id');
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
        Schema::dropIfExists('villas');
    }
}
