<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_users =
        [
            [
                'role_id'        => '1',
                'user_id'        => '1'
            ],
            [
                'role_id'        => '2',
                'user_id'        => '2'
            ] 
        ];
    
        foreach ($role_users as $role_user)
        {
            \SisConPat\RoleUser::create($role_user);
        }
    }
}

