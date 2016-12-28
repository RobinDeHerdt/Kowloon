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
            'product_id'    => 1,
            'question_id'   => 1,
        ]);

        DB::table('product_question')->insert([
            'product_id'    => 1,
            'question_id'   => 2,
        ]);

        DB::table('product_question')->insert([
            'product_id'    => 2,
            'question_id'   => 1,
        ]);

        DB::table('product_question')->insert([
            'product_id'    => 4,
            'question_id'   => 1,
        ]);

        DB::table('product_question')->insert([
            'product_id'    => 5,
            'question_id'   => 1,
        ]);

        DB::table('product_question')->insert([
            'product_id'    => 5,
            'question_id'   => 2,
        ]);

        DB::table('product_question')->insert([
            'product_id'    => 6,
            'question_id'   => 2,
        ]);

        DB::table('product_question')->insert([
            'product_id'    => 7,
            'question_id'   => 2,
        ]);
    }
}
