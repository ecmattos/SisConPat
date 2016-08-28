<?php

use Illuminate\Database\Seeder;

class UserStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_statuses =
        [
            [
                'code'        => 'AV',
                'description' => 'AVALIACAO'
            ],
            [
                'code'        => 'AC',
                'description' => 'A CONFIRMAR'
            ],
            [
                'code'        => 'AT',
                'description' => 'ATIVO'
            ],
            [
                'code'        => 'IN',
                'description' => 'INATIVO'
            ]
        ];
    
        foreach ($user_statuses as $user_status)
        {
            \SisConPat\UserStatus::create($user_status);
        }
    }
}

