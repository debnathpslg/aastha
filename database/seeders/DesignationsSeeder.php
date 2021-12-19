<?php

namespace Database\Seeders;

use App\Models\Designation;
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
        $designation = new Designation;

        $designation->create(['designation' => 'Back Office'])->save();
        $designation->create(['designation' => 'Runner'])->save();
        $designation->create(['designation' => 'Driver'])->save();
        $designation->create(['designation' => 'Supervisor'])->save();
        $designation->create(['designation' => 'Field Supervisor'])->save();
        $designation->create(['designation' => 'Field Executive'])->save();
        $designation->create(['designation' => 'Telecaller'])->save();
        $designation->create(['designation' => '9+ Caller'])->save();
    }
}
