<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions =
        [
            [
                'code'        => '001',
                'description' => 'PORTO ALEGRE'
            ],
            [
                'code'        => '002',
                'description' => 'CAXIAS DO SUL'
            ],
            [
                'code'        => '007',
                'description' => 'IJUI'
            ],
            [
                'code'        => '004',
                'description' => 'SANTA MARIA'
            ],
            [
                'code'        => '005',
                'description' => 'SANTO ANGELO'
            ],
            [
                'code'        => '006',
                'description' => 'PASSO FUNDO'
            ]
        ];
    
        foreach ($regions as $region)
        {
            \SisConPat\Region::create($region);
        }
    }
}

