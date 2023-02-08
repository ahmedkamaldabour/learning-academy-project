<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// \App\Models\User::factory(10)->create();

		// \App\Models\User::factory()->create([
		//     'name' => 'Test User',
		//     'email' => 'test@example.com',
		// ]);

		// create admin user
		User::factory()->create([
			'name'              => 'Admin User',
			'email'             => 'dabourdabour28@gmail.com',
			'password'          => bcrypt('0482543245'),
			'email_verified_at' => now(),
		]);

	}
}
