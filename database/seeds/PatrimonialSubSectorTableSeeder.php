<?php

use Illuminate\Database\Seeder;

class PatrimonialSubSectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_sub_sectors =
        [
            [
                'code'        => '(ND)',
                'description' => '(NAO DEFINIDO)'
            ]
        ];
    
        foreach ($patrimonial_sub_sectors as $patrimonial_sub_sector)
        {
            \SisConPat\PatrimonialSubSector::create($patrimonial_sub_sector);
        }
    }
}

