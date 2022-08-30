<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LocalCommercialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('local_commercial_services')->delete();
        DB::table('local_commercial_services')->insert([
            [
                'lc_service'   => 'Demande Achat'
            ],
            [
                'lc_service'   => 'Offre Vente'
            ]
        ]);
    }
}
