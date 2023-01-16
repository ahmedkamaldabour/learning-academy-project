<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Student;
use App\Models\Testimonial;
use App\Models\Trainer;
use Illuminate\Http\Request;
use function compact;
use function dd;
use function dump;
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
		$this->testimonial = $testimonial;
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
		$testimonials = $this->testimonial::get();
		return view('website/homepage',
			compact('courses', 'courses_count', 'trainers_count', 'student_count', 'testimonials'));
	}
}
