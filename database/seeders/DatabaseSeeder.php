<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            AuthorSeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
