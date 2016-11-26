<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'Splash ' + "'n" + ' fun',
        ]);

        DB::table('tags')->insert([
            'name' => 'Luxury',
        ]);

        DB::table('tags')->insert([
            'name' => 'New',
        ]);

        DB::table('tags')->insert([
            'name' => 'On sale',
        ]);

        DB::table('tags')->insert([
            'name' => 'Other',
        ]);
    }
}
