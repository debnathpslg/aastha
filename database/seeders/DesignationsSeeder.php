<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('designations')->insert([
            [
                'designation' => 'Back Office',
            ],
            [
                'designation' => 'Runner',
            ],
            [
                'designation' => 'Driver',
            ],
            [
                'designation' => 'Supervisor',
            ],
            [
                'designation' => 'Field Supervisor',
            ],
            [
                'designation' => 'Field Executive',
            ],
            [
                'designation' => 'Telecaller',
            ],
            [
                'designation' => '9+ Caller',
            ],
        ]);
    }
}
