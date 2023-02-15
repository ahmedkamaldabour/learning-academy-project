<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;

class WishlistController extends Controller
{
	public function index()
	{
		// get favourite courses from wishlist table is database
		$wishlist = Wishlist::with('course')->where('user_id', auth()->user()->id)->get();
		$courses = $wishlist->pluck('course');
		return view('website/wishlist', compact('courses'));

	}
}


