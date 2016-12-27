<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name_nl'       => 'Honden',
            'name_fr'       => 'Chiens',
            'classname'     => 'dog',
        ]);

        DB::table('categories')->insert([
            'name_nl'       => 'Katten',
            'name_fr'       => 'Chats',
            'classname'     => 'cat',
        ]);

        DB::table('categories')->insert([
            'name_nl'       => 'Vissen',
            'name_fr'       => 'Poisson',
            'classname'     => 'fish',
        ]);

        DB::table('categories')->insert([
            'name_nl'       => 'Vogels',
            'name_fr'       => 'Oiseaux',
            'classname'     => 'bird',
        ]);

        DB::table('categories')->insert([
            'name_nl'       => 'Kleine dieren',
            'name_fr'       => 'Petits animaux',
            'classname'     => 'hamster',
        ]);

        DB::table('categories')->insert([
            'name_nl'       => 'Andere',
            'name_fr'       => 'Autre',
            'classname'     => 'other',
        ]);
    }
}
