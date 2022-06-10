<?php

namespace Database\Seeders;

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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(VoteSeeder::class);
        $this->call(ReplySeeder::class);    
        $this->call(CategoryDetailSeeder::class);
        $this->call(VoteDetailSeeder::class);
        $this->call(PostDetailSeeder::class);
    }
}
