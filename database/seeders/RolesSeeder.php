<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role_description' => 'Super User',
                'role_id' => 99,
            ],
            [
                'role_description' => 'Admin',
                'role_id' => 98,
            ],
            [
                'role_description' => 'Back Office',
                'role_id' => 6,
            ],
            [
                'role_description' => 'Co-Ordinator Level 2',
                'role_id' => 5,
            ],
            [
                'role_description' => 'Co-Ordinator Level 1',
                'role_id' => 4,
            ],
            [
                'role_description' => 'Supervisor',
                'role_id' => 3,
            ],
            [
                'role_description' => 'Telecaller',
                'role_id' => 2,
            ],
            [
                'role_description' => 'Executive',
                'role_id' => 1,
            ],
            [
                'role_description' => 'Deactive User',
                'role_id' => 0,
            ]
        ]);        
    }
}
