<?php

namespace Database\Seeders;

use App\Models\WebsiteCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WebsiteCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kategori website 
        $webCategories = ['Umkm', 'Bisnis', 'Corporate'];

        foreach ($webCategories as $web) {
            WebsiteCategory::create ([
                'name' => $web,
                'slug' => Str::slug($web),
            ]);
        }
    }
}
