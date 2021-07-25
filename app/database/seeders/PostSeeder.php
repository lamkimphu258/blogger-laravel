<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = User::all()->pluck('id');

        for ($i = 0; $i < 100; $i++) {
            Post::factory()
                ->create([
                    'author_id' => Arr::random($userIds->toArray()),
                ]);
        }
    }
}
