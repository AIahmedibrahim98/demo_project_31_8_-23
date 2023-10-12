<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // https://github.com/fzaninotto/Faker
        return [
            'name' => $this->faker->name(),
            'phone' =>  $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'company_email' => $this->faker->companyEmail(),
            'address' => $this->faker->streetAddress(),
            'company' => $this->faker->company(),
            'country' => $this->faker->country(),
            'age' => $this->faker->randomNumber(2),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'comment' => $this->faker->sentence(10),
        ];
    }
}
