<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
			case 'POST':
				return [
					'name'     => 'required|string|max:255|unique:users',
					'email'    => 'required|string|email|max:255|unique:users',
					'password' => 'required|string|min:8',
				];
			case 'PUT':
				return [
					'name'     => 'required|string|max:255',
					'email'    => 'required|string|email|max:255|unique:users,email,'.$this->admin->id,
					'password' => 'nullable|string|min:8',
				];
			default:
				return [];
		}
	}
}
