<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_commercials', function (Blueprint $table) {
            $table->id();
            $table->string('lc_code'); 
            $table->string('lc_etat')->nullable(); 
            $table->string('lc_projets')->nullable(); 
            $table->string('lc_facade')->nullable(); 
            $table->string('lc_situation')->nullable();
            $table->string('lc_localisation')->nullable();
            $table->string('lc_details')->nullable(); 
            
            $table->integer('largeur_1')->default(0)->nullable();
            $table->integer('largeur_2')->default(0)->nullable();
            $table->integer('largeur_3')->default(0)->nullable();
            
            $table->integer('surface')->default(0)->nullable();

            $table->string('description')->nullable();
            $table->integer('hauteur')->default(0)->nullable();
            $table->integer('prix_metre')->default(0)->nullable();
            $table->integer('prix_total')->default(0)->nullable();
            $table->integer('prix_declaration')->default(0)->nullable();
            $table->integer('client_id');
            $table->integer('intermediaire_id');
            $table->integer('city_id');
            $table->integer('city_sector_id');
            $table->integer('lc_service_id');
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
        Schema::dropIfExists('local_commercials');
    }
}
