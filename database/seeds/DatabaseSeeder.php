<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(AccountTableSeeder::class);

        factory(App\Post::class, 20)->create();
        factory(App\Reply::class, 20)->create();
    }
}
