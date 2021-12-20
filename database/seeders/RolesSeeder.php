<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $roles = new Role;

        $roles->create(
            [
                'role_description' => 'Super User',
                'role_id' => 99,
            ]
        )->save();
        $roles->create(
            [
                'role_description' => 'Admin',
                'role_id' => 98,
            ]
        )->save();
        $roles->create(
            [
                'role_description' => 'Co-Ordinator Level 2',
                'role_id' => 6,
            ]
        )->save();
        $roles->create(
            [
                'role_description' => 'Co-Ordinator Level 1',
                'role_id' => 5,
            ]
        )->save();
        $roles->create(
            [
                'role_description' => 'Back Office',
                'role_id' => 4,
            ]
        )->save();
        $roles->create(
            [
                'role_description' => 'Supervisor',
                'role_id' => 3,
            ]
        )->save();
        $roles->create(
            [
                'role_description' => 'Telecaller',
                'role_id' => 2,
            ]
        )->save();
        $roles->create(
            [
                'role_description' => 'Executive',
                'role_id' => 1,
            ]
        )->save();
        $roles->create(
            [
                'role_description' => 'Deactive User',
                'role_id' => 0,
            ]
        )->save();
    }
}
