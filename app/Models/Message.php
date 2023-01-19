<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
use function request;

class Message extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'email',
		'subject',
		'message',
	];

	public static function rules()
	{
		Alert::error('Failed', 'Please check the form below for errors');
		return [
			'name'    => 'required|string|min:3|max:255',
			'email'   => 'required|email|unique:messages,email',
			'subject' => 'required|string|min:3|max:255',
			'message' => 'required|string|min:3',
		];
	}
}
