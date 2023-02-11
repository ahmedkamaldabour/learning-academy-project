<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Trainer;
use App\traits\ImageTrait;
use Illuminate\Http\Request;
use function alert;
use function redirect;

class CourseController extends Controller
{
	use ImageTrait;

	protected Course $course;
	protected Category $category;
	protected Trainer $trainer;

	public function __construct(Course $course, Category $category, Trainer $trainer)
	{
		$this->course = $course;
		$this->category = $category;
		$this->trainer = $trainer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//validation for search
		request()->validate([
			'name' => 'nullable|max:50|regex:/^[a-zA-Z0-9 ]+$/',
		]);
		$courses = $this->course::with('category', 'trainer')->orderBy('id', 'DESC')
			->when(request()->name, function ($q) {
				$q->where('name', 'like', '%'.request()->name.'%');
			})
			->paginate();
		return view('admin.courses.index', compact('courses'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CourseRequest $request)
	{
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$image_name = $this->uploadImage($image, 'courses', 610, 610);
		}
		$this->course::create([
			'name'              => $request->name,
			'small_description' => $request->small_description,
			'description'       => $request->description,
			'price'             => $request->price,
			'category_id'       => $request->category_id,
			'trainer_id'        => $request->trainer_id,
			'image'             => $image_name,
		]);
		alert()->success('Done', 'Course Added successfully');
		return redirect()->route('admin.courses.index')->with('success', 'Course created successfully');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categories = $this->category::get(['id', 'name']);
		$trainers = $this->trainer::get(['id', 'name']);
		return view('admin.courses.create', compact('categories', 'trainers'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Course $course)
	{
		// get only id and name
		$categories = $this->category::get(['id', 'name']);
		$trainers = $this->trainer::get(['id', 'name']);
		return view('admin.courses.edit', compact('course', 'categories', 'trainers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int                       $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(CourseRequest $request, Course $course)
	{
		// check if image exist
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$image_name = $this->uploadImage($image, 'courses', 600, 610, $course->image);
		}
		$course->update([
			'name'              => $request->name,
			'small_description' => $request->small_description,
			'description'       => $request->description,
			'price'             => $request->price,
			'category_id'       => $request->category_id,
			'trainer_id'        => $request->trainer_id,
			'image'             => $image_name ?? $course->image,
		]);
		alert()->success('Done', 'Course Updated successfully');
		return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Course $course)
	{
		$this->deleteImage($course->image, 'courses');
		$course->delete();
		alert()->success('Done', 'Course Deleted successfully');
		return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully');
	}
}
