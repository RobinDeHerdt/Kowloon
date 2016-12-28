<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name_nl'   => 'Verkoeling',
            'name_fr'   => 'Fraicheur',
        ]);

        DB::table('tags')->insert([
            'name_nl'   => 'Luxe',
            'name_fr'   => 'Luxe',
        ]);

        DB::table('tags')->insert([
            'name_nl'   => 'Nieuw',
            'name_fr'   => 'Nouveau',
        ]);

        DB::table('tags')->insert([
            'name_nl'   => 'Korting',
            'name_fr'   => 'En soldes',
        ]);

        DB::table('tags')->insert([
            'name_nl'   => 'Voeding',
            'name_fr'   => 'Nourriture',
        ]);
    }
}
