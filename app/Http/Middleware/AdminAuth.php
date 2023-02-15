<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use function auth;
use function redirect;

class AdminAuth
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request                                                                           $request
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next, $guard = null)
	{
		if (auth()->guard($guard)->check()) {
			$isAdmin = User::where('id', auth()->guard($guard)->user()->id)->first()->status === 'admin';
		} else {
			return redirect()->route('front.login');
		}
		if (auth()->guard($guard)->check() && $isAdmin) {
			return $next($request);
		}
		// if the user is logged in but is not admin, redirect to home page
		if (auth()->guard($guard)->check()) {
			return redirect()->route('front.homepage');
		}
		// if user is not logged in or is not admin, redirect to login page
		return redirect()->route('front.login');


	}
	//	public function handle(Request $request, Closure $next)
	//	{
	//		// check if user is logged in and is admin
	//		//		$isAdmin = auth()->user()->status === 'admin';
	//		// get the status of the user from the database user table
	//		$isAdmin = User::where('id', auth()->user()->id)->first()->status === 'admin';
	//		//		$isAdmin = true;
	//		//		dd($isAdmin);
	//		if (auth()->check() && $isAdmin) {
	//			return $next($request);
	//		} elseif (auth()->check()) {
	//			return redirect()->route('front.homepage');
	//		}
	//		return redirect()->route('front.login');
	//	}

}
