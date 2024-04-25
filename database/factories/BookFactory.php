<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $formats = ["EPUB", "Físico", "Audiolibro", "PDF"];

        return [
            'title' => fake()->sentence(),
            'author' => fake()->name(),
            'format' => $formats[rand(0, 3)],
            'borrower' => null,
            'start_date' => null,
            'limit_date' => null
        ];
    }
}