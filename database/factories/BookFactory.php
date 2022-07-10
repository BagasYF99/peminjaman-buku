<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'title' => $this->faker->text($maxNbChars = 45),
        'author' => $this->faker->name(),
        'isbn' => STR::random(9),
        // 'publised' => $this->faker->dateTimeBetween('1950-01-01', 'now')->format('Ymd'),
        'publised' => $this->faker->numerify('########'),
        'status' => $this->faker->randomElement(['tidak terpinjam']),
        ];
    }
}
