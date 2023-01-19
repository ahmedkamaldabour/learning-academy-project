<?php

namespace App\Http\Requests;

use App\Models\NewsLetter;
use Illuminate\Foundation\Http\FormRequest;
use RealRashid\SweetAlert\Facades\Alert;

class NewsLetterRequest extends FormRequest
{
	protected $errorBag = 'NewsLetter';

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return NewsLetter::newsLetterRules();
	}
}
