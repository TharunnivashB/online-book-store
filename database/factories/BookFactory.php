<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(3),
            'author'      => $this->faker->name,
            'year'        => $this->faker->year,
            'isbn'        => $this->faker->isbn13,
            'description' => $this->faker->paragraph,
            'cover' => 'https://picsum.photos/150/200?' . urlencode($this->faker->word),
            'price'       => $this->faker->randomFloat(2, 5, 50),
            'in_stock'    => $this->faker->boolean(80),
        ];
    }
}
