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
        $created = $this->faker->dateTimeThisDecade();

        return [
            'title' => $this->faker->sentence(2, true),
            'preamble' => $this->faker->paragraph(1),
            'body' => $this->faker->paragraph(6, true),
            'time_span' => $this->faker->randomElement([60, 300, 600, 900, 1800, 3600]),
            'category_id' => $this->faker->numberBetween(1, 5),
            'user_id' => 1,
            'created_at' => $created,
            'updated_at' => $this->faker->randomElement([$created, $created, $created, $created, now()])
        ];
    }
}
