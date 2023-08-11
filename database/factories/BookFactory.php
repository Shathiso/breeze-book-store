<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Models\Book::class;
    
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(),
            'description' => $this->faker->text(),
            'author_id' => rand(1, 5),
            'genre_id' => rand(1, 5),
            'price' => $this->faker->randomDigit(),
            'stock_quantity' => $this->faker->randomDigit()
        ];
    }
}
