<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function login()
	{
		return view('admin.auth.login');
	}

	public function auth(Request $request)
	{
		// validate request
		$request->validate([
			'email'    => 'required|email',
			'password' => 'required|string',
		]);
		$credentials = $request->only('email', 'password');
		if (Auth::attempt($credentials)) {
			// Authentication passed...
			$request->session()->regenerate();
			return redirect()->route('admin.dashboard');
		}
		// flash message for invalid credentials
		$request->session()->flash('error', 'Invalid credentials');
		return redirect()->route('admin.auth.login');
	}

	public function user_register(Request $request)
	{
		// validate request and create user in database
		$request->validate([
			'name'     => 'required|string',
			'email'    => 'required|email|unique:users,email',
			'password' => 'required|string',
		]);
		$user = User::create([
			'name'              => $request->name,
			'email'             => $request->email,
			'password'          => Hash::make($request->password),
			'email_verified_at' => now(),
			'status'            => 'user',
		]);

		// redirect to login page
		return redirect()->route('front.login');

	}

	public function user_login(Request $request)
	{
		// validate request
		$request->validate([
			'email'    => 'required|email',
			'password' => 'required|string',
		]);
		$credentials = $request->only('email', 'password');
		if (Auth::attempt($credentials)) {
			// Authentication passed...
			$request->session()->regenerate();
			return redirect()->route('front.homepage');
		}
		// flash message for invalid credentials
		$request->session()->flash('error', 'Invalid credentials');
		return redirect()->route('front.login');
	}

	public function user_logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('front.login');
	}

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('admin.auth.login');
	}

}
