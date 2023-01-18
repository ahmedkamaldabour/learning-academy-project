<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use function view;

class ViewServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		view()->composer('layouts.EndUser.header', function ($view) {
			$view->with('categories', \App\Models\Category::all());
		});
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
}
