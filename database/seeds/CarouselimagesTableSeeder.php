<?php

use Illuminate\Database\Seeder;

class CarouselimagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carouselimages')->insert([
            'image_url' => 'carousel-1.png',
        ]);

        DB::table('carouselimages')->insert([
            'image_url' => 'carousel-2.png',
        ]);

        DB::table('carouselimages')->insert([
            'image_url' => 'carousel-3.png',
        ]);
    }
}
