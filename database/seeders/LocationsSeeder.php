<?php

namespace Database\Seeders;

use App\Models\Location;
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
        $location = new Location;

        $location->create(['location_name' => 'All Locations'])->save();
        $location->create(['location_name' => 'Siliguri'])->save();
        $location->create(['location_name' => 'Malda'])->save();
        $location->create(['location_name' => 'Mathabhanga'])->save();
        $location->create(['location_name' => 'Baharampur'])->save();
        $location->create(['location_name' => 'Guwahati'])->save();
        $location->create(['location_name' => 'Tezpur'])->save();
        $location->create(['location_name' => 'Agartala'])->save();
    }
}
