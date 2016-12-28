<?php

use Illuminate\Database\Seeder;

class DimensionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dimensions')->insert([
            'body'          => 'S - Ø 53x18cm',
            'product_id'    => 1,
        ]);

        DB::table('dimensions')->insert([
            'body'          => 'M - Ø 53x18cm',
            'product_id'    => 1,
        ]);

        DB::table('dimensions')->insert([
            'body'          => 'L - Ø 53x18cm',
            'product_id'    => 1,
        ]);

        DB::table('dimensions')->insert([
            'body'          => 'S - Ø 53x18cm',
            'product_id'    => 3,
        ]);

        DB::table('dimensions')->insert([
            'body'          => 'M - Ø 53x18cm',
            'product_id'    => 3,
        ]);

        DB::table('dimensions')->insert([
            'body'          => 'L - Ø 53x18cm',
            'product_id'    => 4,
        ]);
    }
}
