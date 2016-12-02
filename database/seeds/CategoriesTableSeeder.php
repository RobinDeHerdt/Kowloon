<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Dogs',
            'image_url' => 'dog.png',
        ]);

        DB::table('categories')->insert([
            'name' => 'Cats',
            'image_url' => 'cat.png',
        ]);

        DB::table('categories')->insert([
            'name' => 'Fish',
            'image_url' => 'fish.png',
        ]);

        DB::table('categories')->insert([
            'name' => 'Birds',
            'image_url' => 'bird.png',
        ]);

        DB::table('categories')->insert([
            'name' => 'Small Animals',
            'image_url' => 'hamster.png',
        ]);

        DB::table('categories')->insert([
            'name' => 'Other',
            'image_url' => 'plus.png',
        ]);
    }
}
