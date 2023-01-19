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
		Schema::create('settings', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('logo');
			$table->string('favicon');
			$table->string('email');
			$table->string('phone');
			$table->string('city');
			$table->string('address');
			$table->string('work_hours');
			$table->text('map');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('instagram');
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
		Schema::dropIfExists('settings');
	}
};
