<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities =
        [
            [
                'state_id'    => '1',
                'description' => 'PORTO ALEGRE'
            ],
            [
                'state_id'    => '1',
                'description' => 'CAXIAS DO SUL'
            ],
            [
                'state_id'    => '1',
                'description' => 'PELOTAS'
            ],
            [
                'state_id'    => '1',
                'description' => 'SANTA MARIA'
            ],
            [
                'state_id'    => '1',
                'description' => 'SANTO ANGELO'
            ],
            [
                'state_id'    => '1',
                'description' => 'IJUI'
            ],
            [
                'state_id'    => '1',
                'description' => 'PASSO FUNDO'
            ],
            [
                'state_id'    => '1',
                'description' => 'ERECHIM'
            ]

        ];
    
        foreach ($cities as $city)
        {
            \SisConPat\City::create($city);
        }
    }
}

