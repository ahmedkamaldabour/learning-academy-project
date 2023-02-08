<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainerRequest extends FormRequest
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
					'name'           => 'required|string|max:50|regex:/^[a-zA-Z ]*$/',
					'email'          => 'required|email|max:50|unique:trainers',
					'phone'          => 'nullable|numeric|digits_between:10,15|unique:trainers',
					'address'        => 'nullable|string|max:50|regex:/^[a-zA-Z0-9 ]*$/',
					'specialized_at' => 'required|string|max:50|regex:/^[a-zA-Z0-9 ]*$/',
					'image'          => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
				];
			case 'PUT':
				return [
					'name'           => 'required|string|max:50|regex:/^[a-zA-Z ]*$/',
					'email'          => 'required|email|max:50|unique:trainers,email,'.$this->trainer->id,
					'phone'          => 'nullable|numeric|digits_between:10,15|unique:trainers,phone,'.$this->trainer->id,
					'address'        => 'nullable|string|max:50|regex:/^[a-zA-Z0-9 ]*$/',
					'specialized_at' => 'required|string|max:50|regex:/^[a-zA-Z0-9 ]*$/',
					'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				];
			default:
				return [];
		}
	}
}
