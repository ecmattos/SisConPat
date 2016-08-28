<?php

use Illuminate\Database\Seeder;

class PatrimonialBrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_brands =
        [
            [
                'code'        => 'SEM',
                'description' => '(SEM MARCA)'
            ]
        ];
    
        foreach ($patrimonial_brands as $patrimonial_brand)
        {
            \SisConPat\PatrimonialBrand::create($patrimonial_brand);
        }
    }
}

