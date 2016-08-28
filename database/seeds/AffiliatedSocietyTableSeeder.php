<?php

use Illuminate\Database\Seeder;

class AffiliatedSocietyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $management_units =
        [
            [
                'code'        => 'S',
                'description' => 'SINTETICA'
            ],
            [
                'code'        => 'A',
                'description' => 'ANALITICA'
            ]
        ];
    
        foreach ($management_units as $affiliated_society)
        {
            \SisConPat\ManagementUnit::create($affiliated_society);
        }
    }
}

