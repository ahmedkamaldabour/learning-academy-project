<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function now;
use function rand;

class CoursestudentSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		for ($i = 1; $i <= 20; $i++) {
			DB::table('Course__student')->insert([
				'course_id'  => rand(1, 18),
				'student_id' => rand(1, 20),
				//			'status'     => 'approve',
				'created_at' => now(),
				'updated_at' => now(),
			]);
		}
	}
}
