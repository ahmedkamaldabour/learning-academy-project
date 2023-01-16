<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course__student', function (Blueprint $table) {
			$table->id();
			$table->foreignId('course_id')->constrained()->onDelete('cascade');
			$table->foreignId('student_id')->constrained()->onDelete('cascade');

			$table->enum('status', ['pending', 'approve', 'reject'])->default('pending');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('course__student');
	}
};
