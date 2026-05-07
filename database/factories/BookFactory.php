<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' =>fake()->text(),
            'country_id'=> fake()->numberBetween(1,50),
            'stocks' => fake()->numberBetween(1,100),
            'amount'=> fake()->randomFloat(2, 0, 1000),
            'photo' => fake()->imageUrl(640, 480, 'products', true)
        ];
    }
}
