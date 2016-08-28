<?php

use Illuminate\Database\Seeder;

class ManagementUnitTableSeeder extends Seeder
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
                'region_id'   => '1',
                'code'        => '0001',
                'description' => 'CEASA PA',
                'city_id'     => '1'
            ],
            [
                'region_id'   => '2',
                'code'        => '0002',
                'description' => 'CEASA CAXIAS',
                'city_id'     => '2'
            ],
            [
                'region_id'   => '3',
                'code'        => '0007',
                'description' => 'CEASA IJUI',
                'city_id'     => '6'
            ],
            [
                'region_id'   => '4',
                'code'        => '0004',
                'description' => 'CEASA S.MARIA',
                'city_id'     => '4'
            ],
            [
                'region_id'   => '5',
                'code'        => '0005',
                'description' => 'CEASA S.ANGELO',
                'city_id'     => '5'
            ],
            [
                'region_id'   => '6',
                'code'        => '0005',
                'description' => 'CEASA P.FUNDO',
                'city_id'     => '7'
            ]
        ];
    
        foreach ($management_units as $management_unit)
        {
            \SisConPat\ManagementUnit::create($management_unit);
        }
    }
}

