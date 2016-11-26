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
        ]);

        DB::table('categories')->insert([
            'name' => 'Cats',
        ]);

        DB::table('categories')->insert([
            'name' => 'Fish',
        ]);

        DB::table('categories')->insert([
            'name' => 'Birds',
        ]);

        DB::table('categories')->insert([
            'name' => 'Small Animals',
        ]);

        DB::table('categories')->insert([
            'name' => 'Other',
        ]);
    }
}
