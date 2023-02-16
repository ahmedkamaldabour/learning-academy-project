<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Student;
use App\Models\Testimonial;
use App\Models\Trainer;
use App\Models\Wishlist;
use DB;
use Illuminate\Http\Request;
use function alert;
use function auth;
use function dd;

class CourseController extends Controller
{

	protected $course;
	protected $category;
	protected $wishlist;

	public function __construct(
		Course   $course,
		Category $category,
		Wishlist $wishlist
	) {
		$this->course = $course;
		$this->category = $category;
		$this->wishlist = $wishlist;
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

	public function addToFavourite($id)
	{
		// get the course by id and add it to the wishlist table and redirect to the same page
		$course = $this->course::findORfail($id);
		$user = auth()->user()->id;
		$this->wishlist::create([
			'user_id'   => $user,
			'course_id' => $id,
		]);
		alert()->success('Course added to your wishlist');
		return back();
	}

	public function removeFromFavourite($id)
	{
		// get the course by id and remove it from the wishlist table and redirect to the same page
		$course = $this->course::findORfail($id);
		$user = auth()->user()->id;
		$this->wishlist::where('user_id', $user)->where('course_id', $id)->delete();
		alert()->success('Course removed from your wishlist');
		return back();

	}

	public function studentCourses()
	{
		// get the courses of the student
		$student_email = auth()->user()->email;
		$student = Student::where('email', $student_email)->first();
		if (!$student) {
			return redirect()->route('front.homepage');
		}
		$courses = $student->courses;

		return view('website/courses/studentCourses', compact('courses'));
	}

}
