<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'price', 'small_description', 'description', 'image', 'category_id', 'trainer_id'];

	public static function isFavorite($course_id)
	{
		$wishlist = Wishlist::where('user_id', Auth::user()->id)->where('course_id', $course_id)->first();
		if ($wishlist) {
			return true;
		}
		return false;
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function trainer()
	{
		return $this->belongsTo(Trainer::class);
	}

	public function students()
	{
		return $this->belongsToMany(Student::class);
	}

	// check if user has already added course to wishlist

	public function wishlist()
	{
		return $this->hasMany(Wishlist::class);
	}
}
