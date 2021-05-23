<?php

namespace Database\Seeders;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Seeder;
use App\Models\Article;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()->times(20)->create();
    }
}
