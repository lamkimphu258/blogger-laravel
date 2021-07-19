<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
            ->has(
                Post::factory()->for(
                    User::factory()->create(), 'author'
                )->count(5)
            )
            ->count(count(CategoryFactory::CATEGORIES))
            ->create();
    }
}
