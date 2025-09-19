<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // memanggil TableSeeder
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(WebsiteCategorySeeder::class);
        $this->call(PortofolioSeeder::class);
        $this->call(InformationSeeder::class);
        $this->call(FeedbackSeeder::class);
    }
}