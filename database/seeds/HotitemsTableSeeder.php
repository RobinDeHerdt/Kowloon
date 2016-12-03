<?php

use Illuminate\Database\Seeder;

class HotitemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotitems')->insert([
            'product_id' => 1,
        ]);

        DB::table('hotitems')->insert([
            'product_id' => 2,
        ]);

        DB::table('hotitems')->insert([
            'product_id' => 3,
        ]);

        DB::table('hotitems')->insert([
            'product_id' => 3,
        ]);
    }
}
