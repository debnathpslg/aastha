<?php

namespace Database\Seeders;

use App\Models\Relation;
use Illuminate\Database\Seeder;

class RelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $relation = new Relation;

        $relation->create(['relation' => 'Self'])->save();
        $relation->create(['relation' => 'Spouse'])->save();
        $relation->create(['relation' => 'Parent'])->save();
        $relation->create(['relation' => 'Relative'])->save();
    }
}
