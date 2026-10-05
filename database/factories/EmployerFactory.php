<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employer>
 */
class EmployerFactory extends Factory
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
            'name' => fake()->company(),
            'user_id' => \App\Models\User::factory(),
            'logo' => 'http://picsum.photos/seed/' . fake()->numberBetween(1, 1000) . '/90/90',
        ];
    }
}
