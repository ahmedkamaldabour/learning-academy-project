<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
					'name'           => 'required|max:50|regex:/^[a-zA-Z0-9 ]+$/',
					'email'          => 'required|email|unique:students,email',
					'phone'          => 'required|numeric|digits:11',
					'specialized_at' => 'nullable|max:50|regex:/^[a-zA-Z0-9 ]+$/',
				];
			case 'PUT':
			case 'PATCH':
				return
					[
						'name'           => 'required|max:50|regex:/^[a-zA-Z0-9 ]+$/',
						'email'          => 'required|email|unique:students,email,'.$this->student->id,
						'phone'          => 'required|numeric|digits:11',
						'specialized_at' => 'nullable|max:50|regex:/^[a-zA-Z0-9 ]+$/',
					];
			default:
				return [];
		}
	}
}
