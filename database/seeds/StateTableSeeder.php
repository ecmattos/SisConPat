<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states =
        [
            [
                'code'        => 'RS',
                'description' => 'RIO GRANDE DO SUL'
            ]
        ];
    
        foreach ($states as $state)
        {
            \SisConPat\State::create($state);
        }
    }
}

