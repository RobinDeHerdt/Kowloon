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
            'name'      => 'Dogs',
            'classname' => 'sprite-dog',
        ]);

        DB::table('categories')->insert([
            'name'      => 'Cats',
            'classname' => 'sprite-cat',
        ]);

        DB::table('categories')->insert([
            'name'      => 'Fish',
            'classname' => 'sprite-fish',
        ]);

        DB::table('categories')->insert([
            'name'      => 'Birds',
            'classname' => 'sprite-bird',
        ]);

        DB::table('categories')->insert([
            'name'      => 'Small Animals',
            'classname' => 'sprite-hamster',
        ]);

        DB::table('categories')->insert([
            'name'      => 'Other',
            'classname' => 'sprite-other',
        ]);
    }
}
