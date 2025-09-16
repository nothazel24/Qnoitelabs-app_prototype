<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Products;
use App\Models\WebsiteCategory;
use App\Models\User;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::where('role', 'admin')->first();
        $authorUser = User::where('role', 'author')->first();
        $categories = WebsiteCategory::all();

        if ($adminUser && $authorUser && $categories->count() > 0) {
            for ($i = 1; $i <= 10; $i++) {
                $user = ($i % 2 == 0) ? $adminUser : $authorUser;
                $webcategory = $categories->random();

                $title = "Sample Product " . $i . " - " . $webcategory->name;
                Products::create([
                    'user_id' => $user->id,
                    'website_category_id' => $webcategory->id,
                    'title' => $title,
                    'meta_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                    'slug' => Str::slug($title),
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    'image' => null,
                    'status' => true,
                    'price' => 0,
                    'discount' => 0,
                    'sku' => strtoupper(Str::random(5)),
                ]);
            }
        }
    }
}
