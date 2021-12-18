<?php

namespace Database\Seeders;

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
        DB::table('carousels')->insert([
            [
                'image_name'=>'1.png',
            ],
            [
                'image_name'=>'2.png',
            ],
            [
                'image_name'=>'3.png',
            ],
            [
                'image_name'=>'4.png',
            ],
            [
                'image_name'=>'5.png',
            ],
            [
                'image_name'=>'6.png',
            ],
            [
                'image_name'=>'7.png',
            ],
            [
                'image_name'=>'8.png',
            ],
            [
                'image_name'=>'9.png',
            ],
            [
                'image_name'=>'10.png',
            ],
        ]);
    }
}
