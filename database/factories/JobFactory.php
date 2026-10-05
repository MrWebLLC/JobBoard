<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => '$' . number_format(fake()->numberBetween(30000, 200000), 2).' USD',
            'location' => fake()->city(),
            'schedule' => fake()->randomElement(['Full Time', 'Part Time', 'Contract']),
            'url' => fake()->url(),
            'featured' => false
        ];
    }
}
