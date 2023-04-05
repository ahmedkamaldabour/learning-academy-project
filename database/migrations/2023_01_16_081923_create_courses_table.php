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
		Schema::create('courses', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->double('price');
			$table->string('small_description');
			$table->text('description');
			$table->string('image');
			$table->foreignId('category_id')->references('id')->on('categories')
				->onDelete('cascade');
			$table->foreignId('trainer_id')->references('id')->on('trainers')
				->onDelete('cascade');
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
		Schema::dropIfExists('courses');
	}
};
