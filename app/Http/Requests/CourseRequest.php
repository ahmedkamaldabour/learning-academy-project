<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
					'name'              => 'required|max:50|regex:/^[a-zA-Z0-9 ]+$/',
					'small_description' => 'required|max:255',
					'description'       => 'required|max:5000',
					'price'             => 'required|numeric',
					'category_id'       => 'required|exists:categories,id',
					'trainer_id'        => 'required|exists:trainers,id',
					'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
				];
			case 'PUT':
				return [
					'name'              => 'required|max:50|regex:/^[a-zA-Z0-9 ]+$/',
					'small_description' => 'required|max:255',
					'description'       => 'required|max:5000',
					'price'             => 'required|numeric',
					'category_id'       => 'required|exists:categories,id',
					'trainer_id'        => 'required|exists:trainers,id',
					'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
				];
			default:
				return [];
		}
	}
}
