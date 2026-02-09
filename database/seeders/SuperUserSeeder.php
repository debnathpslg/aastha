<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $suRole = Role::where('slug', 'SU')->first();

        User::create([
            'name' => 'Super User',
            'email' => 'su@aastha-slg.in',
            'password' => Hash::make('123456'),
            'role_id' => $suRole->id,
            'is_su' => true,
            'is_active' => true,
            'employee_id' => Str::uuid(),
        ]);

        $suRole = Role::where('slug', 'ADM')->first();

        User::create([
            'name' => 'Md Alam',
            'email' => 'md.alam@aastha-slg.in',
            'password' => Hash::make('123456'),
            'role_id' => $suRole->id,
            'is_su' => false,
            'is_active' => true,
            'employee_id' => Str::uuid(),
        ]);

        User::create([
            'name' => 'Nitin Singh',
            'email' => 'nitin.singh@aastha-slg.in',
            'password' => Hash::make('123456'),
            'role_id' => $suRole->id,
            'is_su' => false,
            'is_active' => true,
            'employee_id' => Str::uuid(),
        ]);

        $suRole = Role::where('slug', 'BO')->first();

        User::create([
            'name' => 'Krishna Paul',
            'email' => 'krishna.paul@aastha-slg.in',
            'password' => Hash::make('123456'),
            'role_id' => $suRole->id,
            'is_su' => false,
            'is_active' => true,
            'employee_id' => Str::uuid(),
        ]);
    }
}
