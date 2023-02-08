<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
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
		switch ($this->method()) {
			case 'GET':
			case 'DELETE':
				return [];
			case 'POST':
				return [
					'name'        => 'required|string|max:50|min:3|regex:/^[a-zA-Z ]*$/',
					'description' => 'required|string|max:255|min:3|regex:/^[a-zA-Z0-9 ]*$/',
				];
			case 'PUT':
			case 'PATCH':
				return [
					'name'        => 'required|string|max:50|min:3|regex:/^[a-zA-Z ]*$/',
					'description' => 'required|string|max:255|min:3|regex:/^[a-zA-Z0-9 ]*$/',
				];
			default:
				return [];
		}
	}
}
