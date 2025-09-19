<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portofolio;
use App\Models\WebsiteCategory;

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

                $title = "Sample Portofolio " . $i . " - " . $webcategory->name;
                Portofolio::create([
                    'website_category_id' => $webcategory->id,
                    'title' => $title,
                    'meta_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    'image' => null,
                    'status' => true,
                    'client' => 'Company ' . $i,
                    'demo_url' => "https://companyx" . $i . ".com",
                    'repo_url' => null
                ]);
            }
        }
    }
}
