<?php

use Illuminate\Database\Seeder;

class PatrimonialTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_types =
        [
            [
                'code'        => 'INV',
                'description' => 'INVESTIMENTOS'
            ],
            [
                'code'        => 'IMO',
                'description' => 'IMOVEIS'
            ],
            [
                'code'        => 'SOFT',
                'description' => 'SOFTWARES'
            ],
            [
                'code'        => 'MOB',
                'description' => 'MOBILIARIO'
            ]
        ];
    
        foreach ($patrimonial_types as $patrimonial_type)
        {
            \SisConPat\PatrimonialType::create($patrimonial_type);
        }
    }
}

