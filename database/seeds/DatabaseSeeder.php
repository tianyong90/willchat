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
        // $this->call(UsersTableSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(AccountTableSeeder::class);

        factory(App\Post::class, 20)->create();
        factory(App\Reply::class, 20)->create();
    }
}
