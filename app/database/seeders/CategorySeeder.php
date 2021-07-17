<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Database\Factories\CategoryFactory;
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
        Category::factory()
            ->has(Post::factory()->count(5))
            ->count(count(CategoryFactory::CATEGORIES))
            ->create();
    }
}
