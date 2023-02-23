<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Student;
use App\Models\Testimonial;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use function alert;
use function auth;
use function compact;
use function dd;
use function dump;
use function redirect;
use function view;

class HomePageController extends Controller
{

	protected $course;
	protected $category;
	protected $trainer;
	protected $student;
	protected $testimonials;

	public function __construct(
		Course      $course,
		Category    $category,
		Trainer     $trainer,
		Student     $student,
		Testimonial $testimonial)
	{
		$this->course = $course;
		$this->category = $category;
		$this->trainer = $trainer;
		$this->student = $student;
		$this->testimonials = $testimonial;
	}

	public function index()
	{
		$courses = $this->course::with('Category')->with('trainer')
			->select('id', 'name', 'price', 'image', 'small_description', 'category_id',
				'trainer_id')->orderBy('id', 'desc')->take(3)->get();
		$courses_count = $this->course::count();
		$trainers_count = $this->trainer::count();
		$student_count = $this->student::count();
		// get the testimonials
		$testimonials = $this->testimonials::get();
		return view('website/homepage',
			compact('courses', 'courses_count', 'trainers_count', 'student_count', 'testimonials'));
	}

	public function login()
	{
		return view('website/reg-login/login');
	}

	public function register()
	{
		return view('website/reg-login/reg');
	}

	public function profile()
	{
		$user_email = auth()->user()->email;
		$student = $this->student::where('email', $user_email)->first();
		if ($student) {
			return view('website/profile', compact('student'));
		}
		// if the user is not a student show you're not a student
		alert()->error('Error', 'You are not a student');
		return redirect()->back()->with('error', 'You are not a student');
	}

	public function changeProfileInfo(ProfileRequest $request)
	{

		$user_email = auth()->user()->email;
		$user = User::where('email', $user_email)->first();
		$student = $this->student::where('email', $user_email)->first();
		if ($student) {
			$student->name = $request->name;
			$user->name = $request->name;
			$student->email = $request->email;
			$user->email = $request->email;
			$student->phone = $request->phone;
			$student->specialized_at = $request->specialized_at;
			if ($request->password != null && $request->password != '' && $request->password != ' ') {
				$user->password = bcrypt($request->password);
			}
			$student->save();

			alert()->success('Success', 'Profile Updated Successfully');
			return redirect()->back()->with('success', 'Profile Updated Successfully');
		}
		// if the user is not a student show you're not a student
		alert()->error('Error', 'You are not a student');
		return redirect()->back()->with('error', 'You are not a student');
	}

}
