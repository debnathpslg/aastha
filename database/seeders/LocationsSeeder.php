<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('locations')->insert([
            [
                'location_name'=>'All Locations',
            ],
            [
                'location_name'=>'Siliguri',
            ],
            [
                'location_name'=>'Malda',
            ],
            [
                'location_name'=>'Mathabhanga',
            ],
            [
                'location_name'=>'Baharampur',
            ],
            [
                'location_name'=>'Guwahati',
            ],
            [
                'location_name'=>'Tezpur',
            ],
            [
                'location_name'=>'Agartala',
            ],
        ]);
    }
}
