<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{
	use HasFactory;

	protected $fillable = ['user_id', 'course_id'];

	// wishlist belongs to user
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	// wishlist belongs to course
	public function course()
	{
		return $this->belongsTo(Course::class);
	}

}
