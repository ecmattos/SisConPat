<?php

use Illuminate\Database\Seeder;

class PatrimonialSectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_sectors =
        [
            [
                'code'        => '(ND)',
                'description' => '(NAO DEFINIDO)'
            ]
        ];
    
        foreach ($patrimonial_sectors as $patrimonial_sector)
        {
            \SisConPat\PatrimonialSector::create($patrimonial_sector);
        }
    }
}

