<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MaisonServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maison_services')->delete();
        DB::table('maison_services')->insert([
            [
                'maison_service'   => 'Demande Achat Sur Mer'
            ],
            [
                'maison_service'   => 'Demande Achat'
            ],
            [
                'maison_service'   => 'Demande Location Sur Mer'
            ],
            [
                'maison_service'   => 'Demande Location'
            ],
            [
                'maison_service'   => 'Offre Location'
            ],
            [
                'maison_service'   => 'Offre Location Sur Mer'
            ],
            [
                'maison_service'   => 'Offre Vente'
            ],
            [
                'maison_service'   => 'Offre Vente Sur Mer'
            ]
        ]);
    }
}
