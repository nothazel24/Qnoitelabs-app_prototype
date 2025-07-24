<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {

            $title = "Judul Informasi ke " . $i;

            Information::create([
                'title' => $title,
                'meta_desc' => 'Lorem ipsum dolor sit amet',
                'slug' => Str::slug($title),
                'content' => 'Qnoite - Jasa pembuatan website terpercaya dengan layanan yang memuaskan',
                'status' => true,
            ]);
        }
    }
}
