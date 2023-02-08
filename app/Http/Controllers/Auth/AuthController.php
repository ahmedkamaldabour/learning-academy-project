<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('admin.auth.login');
	}

}
