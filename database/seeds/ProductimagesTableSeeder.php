<?php

use Illuminate\Database\Seeder;

class ProductimagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productimages')->insert([
            'image_url' => 'cooling_mat.png',
            'description' => 'Dog cooling mat image 1',
            'product_id' => 1,
        ]);

        DB::table('productimages')->insert([
            'image_url' => 'cooling_mat.png',
            'description' => 'Dog cooling mat image 2',
            'product_id' => 1,
        ]);

        DB::table('productimages')->insert([
            'image_url' => 'dog-villa.jpg',
            'description' => 'Dog cooling mat image 3',
            'product_id' => 1,
        ]);

        DB::table('productimages')->insert([
            'image_url' => 'dog-villa.jpg',
            'description' => 'Picture of dogvilla.',
            'product_id' => 2,
        ]);

        DB::table('productimages')->insert([
            'image_url' => 'cat-pole.jpg',
            'description' => 'Picture of cat pole.',
            'product_id' => 3,
        ]);

        DB::table('productimages')->insert([
            'image_url' => 'cat-pole.jpg',
            'description' => 'Picture of cat pole.',
            'product_id' => 3,
        ]);

        DB::table('productimages')->insert([
            'image_url' => 'cat-pole.jpg',
            'description' => 'Picture of cat pole.',
            'product_id' => 4,
        ]);
    }
}
