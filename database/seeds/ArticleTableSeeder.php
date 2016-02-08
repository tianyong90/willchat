<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Article::truncate();
        factory(App\Models\Article::class, 20)->create();
    }
}
