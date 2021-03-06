<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(maxNbChars: 50);

        return [
            'title' => $title,
            'content' => $this->faker->paragraph(nbSentences: rand(500, 1000)),
            'slug' => Str::slug($title),
            'like' => $this->faker->randomDigitNotNull,
            'dislike' => $this->faker->randomDigitNotNull,
            'published_at' => $this->faker->date(),
        ];
    }
}
