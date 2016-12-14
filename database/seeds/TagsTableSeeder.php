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
            'tag_name' => "Splash 'n fun",
        ]);

        DB::table('tags')->insert([
            'tag_name' => 'Luxury',
        ]);

        DB::table('tags')->insert([
            'tag_name' => 'New',
        ]);

        DB::table('tags')->insert([
            'tag_name' => 'On sale',
        ]);

        DB::table('tags')->insert([
            'tag_name' => 'Other',
        ]);
    }
}
