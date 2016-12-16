<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductimagesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(ProductTagTableSeeder::class);
        $this->call(CarouselimagesTableSeeder::class);
        $this->call(HotitemsTableSeeder::class);
        $this->call(ProductQuestionTableSeeder::class);
    }
}
