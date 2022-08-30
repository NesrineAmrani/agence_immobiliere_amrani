<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class IntermediaireCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intermediaire_categories')->delete();
        DB::table('intermediaire_categories')->insert([
            [
                'intermediaire_category'   => 'Passager',
                'is_default'    =>  1
            ],
            [
                'intermediaire_category'   => 'Amis',
                'is_default'    =>  0
            ],
            [
                'intermediaire_category'   => 'Famille',
                'is_default'    =>  0
            ],
            [
                'intermediaire_category'   => 'Divers',
                'is_default'    =>  0
            ]
        ]);
        activity()->log('Log from seeder');
    }
}
