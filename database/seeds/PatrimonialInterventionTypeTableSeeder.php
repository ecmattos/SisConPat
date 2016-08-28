<?php

use Illuminate\Database\Seeder;

class PatrimonialInterventionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_intervention_types =
        [
            [
                'code'        => 'AQU',
                'description' => 'AQUISICAO'
            ],
            [
                'code'        => 'MAN',
                'description' => 'MANUTENCAO'
            ]

        ];
    
        foreach ($patrimonial_intervention_types as $patrimonial_intervention_type)
        {
            \SisConPat\PatrimonialInterventionType::create($patrimonial_intervention_type);
        }
    }
}

