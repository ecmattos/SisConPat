<?php

use Illuminate\Database\Seeder;

class PatrimonialModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_models =
        [
            [
                'code'        => 'SEM',
                'description' => '(SEM MODELO)'
            ]
        ];
    
        foreach ($patrimonial_models as $patrimonial_model)
        {
            \SisConPat\PatrimonialModel::create($patrimonial_model);
        }
    }
}

