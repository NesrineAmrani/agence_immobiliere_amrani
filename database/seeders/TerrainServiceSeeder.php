<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TerrainServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terrain_services')->delete();
        DB::table('terrain_services')->insert([
            [
                'terrain_service'   => 'Demande Achat Sur Mer'
            ],
            [
                'terrain_service'   => 'Demande Achat'
            ],
            [
                'terrain_service'   => 'Offre Vente'
            ],
            [
                'terrain_service'   => 'Offre Vente Sur Mer'
            ]
        ]);
    }
}
