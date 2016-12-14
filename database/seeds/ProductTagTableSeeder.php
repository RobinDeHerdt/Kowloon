<?php

use Illuminate\Database\Seeder;

class ProductTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_tag')->insert([
            'product_id' => 1,
            'tag_id' => 3,
        ]);

        DB::table('product_tag')->insert([
            'product_id' => 1,
            'tag_id' => 2,
        ]);

        DB::table('product_tag')->insert([
            'product_id' => 2,
            'tag_id' => 3,
        ]);

        DB::table('product_tag')->insert([
            'product_id' => 2,
            'tag_id' => 4,
        ]);

        DB::table('product_tag')->insert([
            'product_id' => 3,
            'tag_id' => 1,
        ]);

        DB::table('product_tag')->insert([
            'product_id' => 4,
            'tag_id' => 3,
        ]);

        DB::table('product_tag')->insert([
            'product_id' => 4,
            'tag_id' => 5,
        ]);

        DB::table('product_tag')->insert([
            'product_id' => 5,
            'tag_id' => 5,
        ]);

        DB::table('product_tag')->insert([
            'product_id' => 6,
            'tag_id' => 4,
        ]);

        DB::table('product_tag')->insert([
            'product_id' => 7,
            'tag_id' => 1,
        ]);
    }
}
