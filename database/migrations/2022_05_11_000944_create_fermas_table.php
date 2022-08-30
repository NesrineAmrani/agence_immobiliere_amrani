<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFermasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fermas', function (Blueprint $table) {
            $table->id();
            $table->string('ferma_code'); //  APP00001
            $table->string('ferma_facade')->nullable();   // Rue, Patio, Place, Piscine, Sur Mer
            $table->string('ferma_situation')->nullable(); 
            $table->string('ferma_etat')->nullable(); //  neuf/occupe
            $table->string('ferma_surface_total')->nullable();
            $table->string('ferma_surface_batie')->nullable();
            $table->string('surface_jardin')->nullable();
            $table->string('nbr_etages')->nullable();
            $table->string('surface')->nullable();
            $table->string('ferma_details')->nullable();   // Rue, Patio, Place, Piscine, Sur Mer
            $table->integer('largeur_1')->default(0)->nullable();
            $table->integer('largeur_2')->default(0)->nullable();
            $table->integer('largeur_3')->default(0)->nullable();
            $table->string('activite')->nullable();
            $table->string('projet')->nullable();
            $table->string('description')->nullable();
            $table->integer('prix_metre')->default(0)->nullable();
            $table->integer('prix_total')->default(0)->nullable();
            $table->integer('prix_declaration')->default(0)->nullable();
            $table->integer('client_id');
            $table->integer('city_id');
            $table->integer('city_sector_id');
            $table->integer('intermediaire_id');
            $table->integer('ferma_service_id');
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
        Schema::dropIfExists('fermas');
    }
}
