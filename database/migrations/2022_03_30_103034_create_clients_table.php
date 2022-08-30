<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_code');
            $table->integer('client_category_id');
            $table->integer('client_status_id');
            $table->string('client_name');
            $table->string('client_telephone');
            $table->integer('client_city_id')->nullable()->default(0);
            $table->integer('client_city_sector_id')->nullable()->default(0);
            $table->boolean('is_intermediaire')->default(0);
            $table->string('contacts')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
