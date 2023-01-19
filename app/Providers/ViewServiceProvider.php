<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
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
			$view->with('categories', Category::select('id', 'name')->get());
			$view->with('settings', Setting::select('logo', 'favicon')->first());

		});
		view()->composer('layouts.EndUser.head', function ($view) {
			$view->with('settings', Setting::select('logo', 'favicon')->first());
		});
		view()->composer('layouts.EndUser.footer', function ($view) {
			$view->with('settings', Setting::first());
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
