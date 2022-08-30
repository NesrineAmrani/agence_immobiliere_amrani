<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            ClientStatusSeeder::class,
            ClientCategorySeeder::class, 
            IntermediaireStatusSeeder::class,
            IntermediaireCategorySeeder::class,
            AppartementServiceSeeder::class,
            TerrainServiceSeeder::class,
            CitiesTableSeeder::class,
            CitySectorsTableSeeder::class,
            LocalCommercialSeeder::class,
            AppartementServiceSeeder::class,
            MaisonServiceSeeder::class,
            VillaServiceSeeder::class,
            FermaServiceSeeder::class,

        ]);
        \App\Models\Client::factory(40)->create();
        \App\Models\Intermediaire::factory(36)->create();
        // $this->call(CityTableSeeder::class);
        // $this->call(CitySectorTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CitySectorsTableSeeder::class);
    }
}
