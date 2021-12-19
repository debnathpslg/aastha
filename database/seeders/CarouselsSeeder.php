<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarouselsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $carousel = new Carousel;

        $carousel->create(['image_name' => '1.png'])->save();
        $carousel->create(['image_name' => '2.png'])->save();
        $carousel->create(['image_name' => '3.png'])->save();
        $carousel->create(['image_name' => '4.png'])->save();
        $carousel->create(['image_name' => '5.png'])->save();
        $carousel->create(['image_name' => '6.png'])->save();
        $carousel->create(['image_name' => '7.png'])->save();
        $carousel->create(['image_name' => '8.png'])->save();
        $carousel->create(['image_name' => '9.png'])->save();
        $carousel->create(['image_name' => '10.png'])->save();
    }
}
