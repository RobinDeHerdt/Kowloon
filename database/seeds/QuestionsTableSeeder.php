<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'title' => 'How does it cool the dog?',
            'body' => 'Very new technology cools dog.',
            'product_id' => 1,
        ]);

        DB::table('questions')->insert([
            'title' => 'Will my dog get undercooled?',
            'body' => 'No.',
            'product_id' => 1,
        ]);

        DB::table('questions')->insert([
            'title' => 'Can I use this to cool myself?',
            'body' => 'If you are a dog, sure.',
            'product_id' => 1,
        ]);

        DB::table('questions')->insert([
            'title' => 'How do I know I am not a dog',
            'body' => '...',
            'product_id' => 1,
        ]);
    }
}
