<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
	public function definition():array
	{
		return [
			'username' => $this->faker->name(),
			'email'    => $this->faker->unique()->safeEmail(),
			'password' => bcrypt('0482543245'),
		];
	}
}
