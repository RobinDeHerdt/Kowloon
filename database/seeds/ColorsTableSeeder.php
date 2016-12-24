<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'hex' => '#fff',
            'product_id' => 1,
        ]);

        DB::table('colors')->insert([
            'hex' => '#fff',
            'product_id' => 1,
        ]);

        DB::table('colors')->insert([
            'hex' => '#123123',
            'product_id' => 1,
        ]);
    }
}
