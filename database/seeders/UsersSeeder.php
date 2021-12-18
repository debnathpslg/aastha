<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            [
                'user_name' => 'Partha Debanth',
                'user_email' => 'partha.aastha@gmail.com',
                'user_mobile' => '9832356644',
                'password' => Hash::make('12345'),
                'user_role' => 99,
                'is_active' => true,
                'location_id' => 1,
                'is_logged_in' => false,
                'emp_id' => 'AAST000226',
            ],
            [
                'user_name' => 'Md Alam',
                'user_email' => 'alam.aastha@gmail.com',
                'user_mobile' => '9474407312',
                'password' => Hash::make('12345'),
                'user_role' => 98,
                'is_active' => true,
                'location_id' => 1,
                'is_logged_in' => false,
                'emp_id' => 'AAST000673',
            ],
            [
                'user_name' => 'Sekh Shanewaz',
                'user_email' => 'skshanewaz.aastha@gmail.com',
                'user_mobile' => '9593901016',
                'password' => Hash::make('12345'),
                'user_role' => 98,
                'is_active' => true,
                'location_id' => 1,
                'is_logged_in' => false,
                'emp_id' => 'AAST000229',
            ],
            [
                'user_name' => 'Pravat Sarkar',
                'user_email' => 'pravat.aastha@gmail.com',
                'user_mobile' => '9563152800',
                'password' => Hash::make('12345'),
                'user_role' => 6,
                'is_active' => true,
                'location_id' => 2,
                'is_logged_in' => false,
                'emp_id' => 'AAST000227',
            ],
            [
                'user_name' => 'Dummy User 1',
                'user_email' => 'dummy1.aastha@gmail.com',
                'user_mobile' => '9832098320',
                'password' => Hash::make('12345'),
                'user_role' => 0,
                'is_active' => false,
                'location_id' => 2,
                'is_logged_in' => false,
                'emp_id' => 'AAST000000',
            ],
        ]);
    }
}
