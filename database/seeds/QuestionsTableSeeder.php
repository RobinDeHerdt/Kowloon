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
            'question'  => 'How does it cool the dog?',
            'answer'    => 'Very new technology cools dog.',
        ]);

        DB::table('questions')->insert([
            'question'  => 'Will my dog get undercooled?',
            'answer'    => 'No.',
        ]);

        DB::table('questions')->insert([
            'question'  => 'Can I use this to cool myself?',
            'answer'    => 'If you are a dog, sure.',
        ]);

        DB::table('questions')->insert([
            'question'  => 'How do I know I am not a dog',
            'answer'    => '...',
        ]);

        DB::table('questions')->insert([
            'question'  => 'What is this about all about?',
            'answer'    => "It's about our company, kowloon.",
        ]);
    }
}
