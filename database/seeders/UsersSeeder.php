<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User;

        $user->create([
            'user_name' => 'Partha Debanth',
            'user_email' => 'partha.aastha@gmail.com',
            'user_mobile' => '9832356644',
            'password' => Hash::make('12345678'),
            'user_role' => 99,
            'is_active' => true,
            'location_id' => 1,
            'is_logged_in' => false,
            'emp_id' => 'AAST000226',
        ])->save();
        $user->create([
            'user_name' => 'Md Alam',
            'user_email' => 'alam.aastha@gmail.com',
            'user_mobile' => '9474407312',
            'password' => Hash::make('12345678'),
            'user_role' => 98,
            'is_active' => true,
            'location_id' => 1,
            'is_logged_in' => false,
            'emp_id' => 'AAST000673',
        ])->save();
        $user->create([
            'user_name' => 'Sekh Shanewaz',
            'user_email' => 'skshanewaz.aastha@gmail.com',
            'user_mobile' => '9593901016',
            'password' => Hash::make('12345678'),
            'user_role' => 98,
            'is_active' => true,
            'location_id' => 1,
            'is_logged_in' => false,
            'emp_id' => 'AAST000229',
        ])->save();
        $user->create([
            'user_name' => 'Pravat Sarkar',
            'user_email' => 'pravat.aastha@gmail.com',
            'user_mobile' => '9563152800',
            'password' => Hash::make('12345678'),
            'user_role' => 6,
            'is_active' => true,
            'location_id' => 2,
            'is_logged_in' => false,
            'emp_id' => 'AAST000227',
        ])->save();
        $user->create([
            'user_name' => 'Subrata Sarlar',
            'user_email' => 'aastha.subrata@gmail.com',
            'user_mobile' => '9933671962',
            'password' => Hash::make('12345678'),
            'user_role' => 0,
            'is_active' => false,
            'location_id' => 2,
            'is_logged_in' => false,
            'emp_id' => 'AASTPROP01',
        ])->save();
        $user->create([
            'user_name' => 'Koustav Dey',
            'user_email' => 'koustav.aastha@gmail.com',
            'user_mobile' => '9933094870',
            'password' => Hash::make('12345678'),
            'user_role' => 0,
            'is_active' => false,
            'location_id' => 2,
            'is_logged_in' => false,
            'emp_id' => 'AASTPROP02',
        ])->save();
        $user->create([
            'user_name' => 'Dummy User 1',
            'user_email' => 'dummy1.aastha@gmail.com',
            'user_mobile' => '9999999999',
            'password' => Hash::make('12345678'),
            'user_role' => 0,
            'is_active' => false,
            'location_id' => 2,
            'is_logged_in' => false,
            'emp_id' => 'AAST999999',
        ])->save();
        $user->create([
            'user_name' => 'Dummy User 2',
            'user_email' => 'dummy2.aastha@gmail.com',
            'user_mobile' => '9999999998',
            'password' => Hash::make('12345678'),
            'user_role' => 0,
            'is_active' => false,
            'location_id' => 2,
            'is_logged_in' => false,
            'emp_id' => 'AAST999998',
        ])->save();
        $user->create([
            'user_name' => 'Dummy User 3',
            'user_email' => 'dummy3.aastha@gmail.com',
            'user_mobile' => '9999999997',
            'password' => Hash::make('12345678'),
            'user_role' => 0,
            'is_active' => false,
            'location_id' => 2,
            'is_logged_in' => false,
            'emp_id' => 'AAST999997',
        ])->save();
        $user->create([
            'user_name' => 'Dummy User 4',
            'user_email' => 'dummy4.aastha@gmail.com',
            'user_mobile' => '9999999996',
            'password' => Hash::make('12345678'),
            'user_role' => 0,
            'is_active' => false,
            'location_id' => 2,
            'is_logged_in' => false,
            'emp_id' => 'AAST999996',
        ])->save();
    }
}
