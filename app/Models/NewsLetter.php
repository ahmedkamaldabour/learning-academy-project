<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
use function alert;

class NewsLetter extends Model
{
	use HasFactory;

	protected $fillable = ['email'];

	public static function newsLetterRules()
	{
		Alert::error('Failed', 'Email is empty or already subscribed');
		return [
			'email' => 'required|email|unique:news_letters,email',
		];
	}
}
