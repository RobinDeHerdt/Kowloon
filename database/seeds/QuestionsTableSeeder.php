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
            'question_nl'   => 'Hoe werkt dit product?',
            'question_fr'   => 'Comment fonctionne ce produit?',
            'answer_nl'     => 'Nieuwe technologie',
            'answer_fr'     => 'Nouvelle technologie',
        ]);

        DB::table('questions')->insert([
            'question_nl'   => 'Kan mijn hond onderkoeld raken?',
            'question_fr'   => 'Mon chien peut-il obtenir l\'hypothermie?',
            'answer_nl'     => 'Nee.',
            'answer_fr'     => 'Non.',
        ]);

        DB::table('questions')->insert([
            'question_nl'   => 'Hoe contacteer ik Kowloon?',
            'question_fr'   => 'Comment dois-je contacter Kowloon?',
            'answer_nl'     => 'Vul het contactformulier in op de \'about\' pagina',
            'answer_fr'     => 'Remplissez le formulaire de contact sur la page \'about\'',
        ]);
    }
}
