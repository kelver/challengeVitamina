<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->word(),
            'author'        => $this->faker->name(),
            'description'   => $this->faker->text(200),
            'pages'         => $this->faker->numberBetween(100, 800),
            'user_id'       => User::factory()->create()
        ];
    }
}
