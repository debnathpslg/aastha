<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create([
            'name' => 'Super User',
            'slug' => 'SU',
            'level' => 99,
            'permission' => 255,   // CRUD = 1+2+4+8+16+32+64+128
            'is_system' => true
        ]);

        Role::create([
            'name' => 'Admin',
            'slug' => 'ADM',
            'level' => 80,
            'permission' => 15,
            'is_system' => true
        ]);

        Role::create([
            'name' => 'Manager',
            'slug' => 'MAN',
            'level' => 60,
            'permission' => 7,   // read+create+update
            'is_system' => true
        ]);

        Role::create([
            'name' => 'Backoffice Authoriser',
            'slug' => 'BOA',
            'level' => 40,
            'permission' => 7,
            'is_system' => true
        ]);

        Role::create([
            'name' => 'Backoffice',
            'slug' => 'BO',
            'level' => 20,
            'permission' => 3,   // read+create
            'is_system' => true
        ]);

        Role::create([
            'name' => 'Supervisor',
            'slug' => 'SV',
            'level' => 10,
            'permission' => 1,   // read only
            'is_system' => true
        ]);
    }
}
