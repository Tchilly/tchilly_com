<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(2, true),
            'preamble' => $this->faker->paragraph(1),
            'body' => $this->faker->paragraph(6, true),
            'time_span' => '900', // 15 min
            'category_id' => 1,
            'user_id' => 1,
        ];
    }
}
