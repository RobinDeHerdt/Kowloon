<?php

use Illuminate\Database\Seeder;

class ProductQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_question')->insert([
            'product_id' => 1,
            'question_id' => 1,
        ]);

        DB::table('product_question')->insert([
            'product_id' => 1,
            'question_id' => 2,
        ]);

        DB::table('product_question')->insert([
            'product_id' => 1,
            'question_id' => 3,
        ]);

        DB::table('product_question')->insert([
            'product_id' => 1,
            'question_id' => 4,
        ]);

        DB::table('product_question')->insert([
            'product_id' => 2,
            'question_id' => 4,
        ]);
    }
}
