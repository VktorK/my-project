<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['title' => 'легкий'],
            ['title' => 'тяжелый'],
            ['title' => 'хрупкий'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['title' => $category['title']],$category);
        }
    }
}
