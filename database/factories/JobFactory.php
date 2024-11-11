<?php

namespace Database\Factories;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
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
            'employer_id' => Employer::Factory(),
             'title' => fake()->jobTitle,
            'salary' => fake()->randomElement(['$70.00 USD', '$800.00 USD', '$600.00 USD']),
            'location' =>'Remote', 
            'schedule' => 'Full Time',
            'url' => fake()->url,
            'featured' => false

        ];
    }
}
