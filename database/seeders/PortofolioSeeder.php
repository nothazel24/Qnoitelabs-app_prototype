<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portofolio;
use App\Models\WebsiteCategory;

use Illuminate\Support\Str;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = WebsiteCategory::all();

        if ($categories->count() > 0) {
            for ($i = 1; $i <= 10; $i++) {
                $webcategory = $categories->random();

                $title = "Sample Demo website " . $i . " - " . $webcategory->name;
                Portofolio::create([
                    'website_category_id' => $webcategory->id,
                    'title' => $title,
                    'meta_desc' => 'lorem ipsum dolor sit amet',
                    'slug' => Str::slug($title),
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                    'image' => null,
                    'status' => true,
                ]);
            }
        }
    }
}
