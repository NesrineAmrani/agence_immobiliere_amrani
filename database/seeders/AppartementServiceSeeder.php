<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class AppartementServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appartement_services')->delete();
        DB::table('appartement_services')->insert([
            [
                'appartement_service'   => 'Demande Achat Sur Mer'
            ],
            [
                'appartement_service'   => 'Demande Achat'
            ],
            [
                'appartement_service'   => 'Demande Location Sur Mer'
            ],
            [
                'appartement_service'   => 'Demande Location'
            ],
            [
                'appartement_service'   => 'Offre Location'
            ],
            [
                'appartement_service'   => 'Offre Location Sur Mer'
            ],
            [
                'appartement_service'   => 'Offre Vente'
            ],
            [
                'appartement_service'   => 'Offre Vente Sur Mer'
            ]
        ]);
    }
}
