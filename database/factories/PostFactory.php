<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Author;
use App\Models\Post;

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
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug(),
            'thumbnail' => $this->faker->text(),
            'excerpt' => $this->faker->word(),
            'minutes_to_read' => $this->faker->numberBetween(-10000, 10000),
            'status' => $this->faker->randomElement(["published","draft","private",""]),
            'author_id' => Author::factory(),
            'body' => $this->faker->text(),
        ];
    }
}
