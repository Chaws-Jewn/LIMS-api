<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['thesis', 'dissertation', 'capstone', 'feasibility study']),
            'title' => fake()->words(3, true),
            'author' => fake()->name(),
            'course_id' => fake()->numberBetween(1, 4), 
            'image_location' => fake()->filePath(), 
            'date_published' => fake()->date(), 
            'language' => fake()->randomElement(['FIL', 'FOR']),
            'abstract' => fake()->sentence(20, true),
        ];
    }
}
