<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class VillaServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('villa_services')->delete();
        DB::table('villa_services')->insert([
            [
                'villa_service'   => 'Demande Achat Sur Mer'
            ],
            [
                'villa_service'   => 'Demande Achat'
            ],
            [
                'villa_service'   => 'Demande Location Sur Mer'
            ],
            [
                'villa_service'   => 'Demande Location'
            ],
            [
                'villa_service'   => 'Offre Location'
            ],
            [
                'villa_service'   => 'Offre Location Sur Mer'
            ],
            [
                'villa_service'   => 'Offre Vente'
            ],
            [
                'villa_service'   => 'Offre Vente Sur Mer'
            ]
        ]);
    }
}
