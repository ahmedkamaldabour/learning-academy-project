<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{

		return [
			'name'        => $this->faker->name,
			'job'         => $this->faker->jobTitle,
			'description' => $this->faker->text,
			'image'       => "testimonial_img_1.png",
		];
	}

}
