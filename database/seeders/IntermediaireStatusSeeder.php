<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class IntermediaireStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intermediaire_statuses')->delete();
        DB::table('intermediaire_statuses')->insert([
            [
                'intermediaire_status'         => 'Disponible',
                'is_default'            =>  1          
            ],
            [
                'intermediaire_status'   => 'Liste Noire',
                'is_default'    =>  0               
            ],
            [
                'intermediaire_status'         => 'Autres',
                'is_default'            =>  0       
            ]
        ]);
    }
}
