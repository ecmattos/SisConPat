<?php

use Illuminate\Database\Seeder;

class MemberStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member_statuses =
        [
            [
                'code'        => 'IN',
                'description' => 'INATIVO'
            ],
            [
                'code'        => 'AT',
                'description' => 'ATIVO'
            ]
        ];
    
        foreach ($member_statuses as $member_status)
        {
            \SisConPat\MemberStatus::create($member_status);
        }
    }
}

