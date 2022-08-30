<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Db;

class FermaServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ferma_services')->delete();
        DB::table('ferma_services')->insert([
            [
                'ferma_service'   => 'Demande Achat Sur Mer'
            ],
            [
                'ferma_service'   => 'Demande Achat'
            ],
            [
                'ferma_service'   => 'Demande Location Sur Mer'
            ],
            [
                'ferma_service'   => 'Demande Location'
            ],
            [
                'ferma_service'   => 'Offre Location'
            ],
            [
                'ferma_service'   => 'Offre Location Sur Mer'
            ],
            [
                'ferma_service'   => 'Offre Vente'
            ],
            [
                'ferma_service'   => 'Offre Vente Sur Mer'
            ]
        ]);
    }
}
