<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Dog cooler',
            'price' => 15.99,
            'description' => 'Dog cooling mat',
            'technical_description' => 'Technical description of a dog cooling mat.',
            'category_id' => 1,
        ]);
    }
}
