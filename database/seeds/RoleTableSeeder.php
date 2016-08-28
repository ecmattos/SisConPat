<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =
        [
            [
                'role_title'        => 'Administração',
                'role_slug'         => 'admin'
            ],
            [
                'role_title'        => 'Programação',
                'role_slug'         => 'prog'
            ]   
        ];
    
        foreach ($roles as $role)
        {
            \SisConPat\Role::create($role);
        }
    }
}

