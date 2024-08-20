<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Author;
use App\Models\User;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'avatar' => $this->faker->text(),
            'writerName' => $this->faker->word(),
            'socialLink' => $this->faker->text(),
            'btn_icon' => $this->faker->text(),
            'btn_text' => $this->faker->word(),
        ];
    }
}
