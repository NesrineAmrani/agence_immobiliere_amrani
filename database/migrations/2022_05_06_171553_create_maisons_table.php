<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maisons', function (Blueprint $table) {
            $table->id();
            $table->string('maison_code'); //  APP00001
            $table->string('maison_facade')->nullable();   // Rue, Patio, Place, Piscine, Sur Mer
            $table->string('maison_situation')->nullable(); 
            $table->string('maison_etat')->nullable(); //  neuf/occupe
            $table->string('garage_surface')->nullable();
            $table->string('garage_hauteur')->nullable();
            $table->string('surface_etage')->nullable();
            $table->string('surface_recule')->nullable();
            $table->string('nbr_etages')->nullable();
            $table->string('maison_details')->nullable(); 
            $table->integer('largeur_1')->default(0)->nullable();
            $table->integer('largeur_2')->default(0)->nullable();
            $table->integer('largeur_3')->default(0)->nullable();
            $table->string('description')->nullable();
            $table->integer('prix_metre')->default(0)->nullable();
            $table->integer('prix_total')->default(0)->nullable();
            $table->integer('prix_declaration')->default(0)->nullable();
            $table->integer('client_id');
            $table->integer('city_id');
            $table->integer('city_sector_id');
            $table->integer('intermediaire_id');
            $table->integer('maison_service_id');
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
        Schema::dropIfExists('maisons');
    }
}
