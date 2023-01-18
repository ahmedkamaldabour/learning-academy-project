<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Student;
use App\Models\Testimonial;
use App\Models\Trainer;
use Illuminate\Http\Request;
use function dd;

class CourseController extends Controller
{

	protected $course;
	protected $category;

	public function __construct(
		Course   $course,
		Category $category,)
	{
		$this->course = $course;
		$this->category = $category;
	}

	public function category($id)
	{
		// get the category by id
		$category = $this->category::findORfail($id);
		// get the courses with the category id = $id
		$courses = $this->course::where('category_id', $id)->paginate(3);
		return view('website/courses/category', compact('courses', 'category'));
	}

	public function singleCourse($courseId)
	{
		$course = $this->course::findORfail($courseId);
		return view('website/courses/singleCourse', compact('course'));
	}
}
