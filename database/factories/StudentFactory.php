<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use function fake;
use function now;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'name'           => fake()->name(),
			'email'          => fake()->unique()->safeEmail(),
			'phone'          => fake()->phoneNumber(),
			'specialized_at' => fake()->jobTitle(),
		];
	}
}
