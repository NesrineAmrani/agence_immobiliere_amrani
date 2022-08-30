<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ClientStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_statuses')->delete();
        DB::table('client_statuses')->insert([
            [
                'client_status'         => 'Disponible',
                'is_default'            =>  1          
            ],
            [
                'client_status'   => 'Liste Noire',
                'is_default'    =>  0               
            ],
            [
                'client_status'         => 'Autres',
                'is_default'            =>  0       
            ]
        ]);
    }
}