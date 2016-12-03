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

        DB::table('products')->insert([
            'name' => 'Dog villa',
            'price' => 999.99,
            'description' => 'Very large dog villa.',
            'technical_description' => 'Very large dog villa for very large dog.',
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Cat pole',
            'price' => 999.99,
            'description' => 'Average sized cat pole.',
            'technical_description' => 'Very average sized cat pole.',
            'category_id' => 2,
        ]);
        
        DB::table('products')->insert([
            'name' => 'Cat pole',
            'price' => 999.99,
            'description' => 'Average sized cat pole.',
            'technical_description' => 'Very average sized cat pole.',
            'category_id' => 2,
        ]);
    }
}
