<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 21,
                'city_name_fr' => 'Tanger',
                'city_status' => 1,
                'is_default' => 0,
            ),
            1 => 
            array (
                'id' => 23,
                'city_name_fr' => 'Tétouan',
                'city_status' => 1,
                'is_default' => 1,
            ),
        ));
        
        
    }
}