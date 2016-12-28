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
            'name_nl'                   => 'Koelmat',
            'name_fr'                   => 'Mat fraîche',
            'price'                     => 15.99,
            'description_nl'            => 'Koelmat voor honden',
            'description_fr'            => 'Mat fraîche pour des chiens',
            'technical_description_nl'  => 'Technische beschrijving van een koelmat',
            'technical_description_fr'  => 'Description technique d\'un mat fraîche',
            'category_id'               => 1,
        ]);

        DB::table('products')->insert([
            'name_nl'                   => 'Hondenvilla',
            'name_fr'                   => 'Chienvilla',
            'price'                     => 58.95,
            'description_nl'            => 'Villa voor honden',
            'description_fr'            => 'Villa pour des chiens',
            'technical_description_nl'  => 'Technische beschrijving van een hondenvilla',
            'technical_description_fr'  => 'Description technique chienvilla',
            'category_id'               => 1,
        ]);

        DB::table('products')->insert([
            'name_nl'                   => 'Kattenkrabpaal',
            'name_fr'                   => 'Chat griffoir',
            'price'                     => 29.99,
            'description_nl'            => 'Average sized cat pole.',
            'description_fr'            => 'Average sized cat pole.',
            'technical_description_nl'  => 'Very average sized cat pole.',
            'technical_description_fr'  => 'Very average sized cat pole.',
            'category_id'               => 2,
        ]);
        
        DB::table('products')->insert([
            'name_nl'                   => 'Kattenkrabpaal 2.0',
            'name_fr'                   => 'Chat griffoir 2.0',
            'price'                     => 39.99,
            'description_nl'            => 'Average sized cat pole.',
            'description_fr'            => 'Average sized cat pole.',
            'technical_description_nl'  => 'Very average sized cat pole.',
            'technical_description_fr'  => 'Very average sized cat pole.',
            'category_id'               => 2,
        ]);

        DB::table('products')->insert([
            'name_nl'                   => 'Koelmat 2.0',
            'name_fr'                   => 'Mat fraîche 2.0',
            'price'                     => 25.99,
            'description_nl'            => 'Koelmat voor honden',
            'description_fr'            => 'Mat fraîche pour des chiens',
            'technical_description_nl'  => 'Technische beschrijving van een koelmat',
            'technical_description_fr'  => 'Description technique d\'un mat fraîche',
            'category_id'               => 1,
        ]);

        DB::table('products')->insert([
            'name_nl'                   => 'Koelmat 3.0',
            'name_fr'                   => 'Mat fraîche 3.0',
            'price'                     => 35.99,
            'description_nl'            => 'Koelmat voor honden',
            'description_fr'            => 'Mat fraîche pour des chiens',
            'technical_description_nl'  => 'Technische beschrijving van een koelmat',
            'technical_description_fr'  => 'Description technique d\'un mat fraîche',
            'category_id'               => 1,
        ]);

        DB::table('products')->insert([
            'name_nl'                   => 'Koelmat 4.0',
            'name_fr'                   => 'Mat fraîche 4.0',
            'price'                     => 505.99,
            'description_nl'            => 'Koelmat voor honden',
            'description_fr'            => 'Mat fraîche pour des chiens',
            'technical_description_nl'  => 'Technische beschrijving van een koelmat',
            'technical_description_fr'  => 'Description technique d\'un mat fraîche',
            'category_id'               => 1,
        ]);

        DB::table('products')->insert([
            'name_nl'                   => 'Vissenvoer',
            'name_fr'                   => 'Aliments poissons',
            'price'                     => 4.95,
            'description_nl'            => 'Voeding voor vissen',
            'description_fr'            => 'Aliments pour poissons',
            'technical_description_nl'  => 'Technische beschrijving voor voeding voor vissen',
            'technical_description_fr'  => 'Description technique aliments pour poissons',
            'category_id'               => 3,
        ]);
    }
}
