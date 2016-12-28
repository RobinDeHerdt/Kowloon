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
            'image_url'         => 'cooling_mat.png',
            'description_nl'    => 'Voorbeeld',
            'description_fr'    => 'Example',
            'product_id'        => 1,
        ]);

        DB::table('productimages')->insert([
            'image_url'         => 'cooling_mat.png',
            'description_nl'    => 'Voorbeeld',
            'description_fr'    => 'Example',
            'product_id'        => 5,
        ]);

        DB::table('productimages')->insert([
            'image_url'         => 'cooling_mat.png',
            'description_nl'    => 'Voorbeeld',
            'description_fr'    => 'Example',
            'product_id'        => 6,
        ]);

        DB::table('productimages')->insert([
            'image_url'         => 'cooling_mat.png',
            'description_nl'    => 'Voorbeeld',
            'description_fr'    => 'Example',
            'product_id'        => 7,
        ]);

        DB::table('productimages')->insert([
            'image_url'         => 'cooling_mat.png',
            'description_nl'    => 'Voorbeeld',
            'description_fr'    => 'Example',
            'product_id'        => 1,
        ]);

        DB::table('productimages')->insert([
            'image_url'         => 'dog-villa.jpg',
            'description_nl'    => 'Voorbeeld',
            'description_fr'    => 'Example',
            'product_id'        => 1,
        ]);

        DB::table('productimages')->insert([
            'image_url'         => 'dog-villa.jpg',
            'description_nl'    => 'Voorbeeld',
            'description_fr'    => 'Example',
            'product_id'        => 2,
        ]);

        DB::table('productimages')->insert([
            'image_url'         => 'cat-pole.jpg',
            'description_nl'    => 'Voorbeeld',
            'description_fr'    => 'Example',
            'product_id'        => 3,
        ]);

        DB::table('productimages')->insert([
            'image_url'         => 'cat-pole.jpg',
            'description_nl'    => 'Voorbeeld',
            'description_fr'    => 'Example',
            'product_id'        => 1,
        ]);

        DB::table('productimages')->insert([
            'image_url'         => 'cat-pole.jpg',
            'description_nl'    => 'Voorbeeld',
            'description_fr'    => 'Example',
            'product_id'        => 4,
        ]);

         DB::table('productimages')->insert([
            'image_url'         => 'vissenvoer.jpg',
            'description_nl'    => 'Voorbeeld',
            'description_fr'    => 'Example',
            'product_id'        => 8,
        ]);
    }
}
