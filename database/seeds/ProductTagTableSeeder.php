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
            'tag_id' => 1,
        ]);

        DB::table('product_tag')->insert([
            'product_id' => 1,
            'tag_id' => 2,
        ]);
    }
}
