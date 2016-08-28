<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks =
        [
            [
                'code'        => 'NI',
                'description' => '(NAO INFORMADO)'
            ],
            [
                'code'        => '041',
                'description' => 'BANRISUL'
            ]
        ];
    
        foreach ($banks as $bank)
        {
            \SisConPat\Bank::create($bank);
        }
    }
}

