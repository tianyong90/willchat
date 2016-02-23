<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Post::truncate();
        factory(App\Models\Post::class, 20)->create();
    }
}
