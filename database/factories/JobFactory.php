<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recruiter_id' => User::factory()->state(['role' => 'recruiter']), // Will be overridden if recruiter passed
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraphs(3, true),
            'location' => $this->faker->city() . ', ' . $this->faker->country(),
            'contract_type' => $this->faker->randomElement(['full_time', 'part_time', 'contract', 'internship', 'freelance']),
            'salary' => '$' . $this->faker->numberBetween(40, 150) . 'k/year',
            'status' => $this->faker->randomElement(['active', 'active', 'active', 'pending', 'rejected', 'expired']), // Weighted towards active
            'created_at' => $this->faker->dateTimeBetween('-2 months', 'now'),
        ];
    }
}
