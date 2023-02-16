<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\Trainer;
use Illuminate\Http\Request;
use function compact;

class DashboardController extends Controller
{
	public function index()
	{
		$data = [];
		$student = Student::count();
		$data['student'] = $student;
		$trainer = Trainer::count();
		$data['trainer'] = $trainer;
		$courses = Course::count();
		$data['courses'] = $courses;
		$trainer_most_course = Trainer::withCount('courses')->orderBy('courses_count', 'desc')->first();
		$data['trainer_most_course'] = $trainer_most_course;
		$student_most_course = Student::withCount('courses')->orderBy('courses_count', 'desc')->first();
		$data['student_most_course'] = $student_most_course;
		$course_most_student = Course::withCount('students')->orderBy('students_count', 'desc')->first();
		$data['course_most_student'] = $course_most_student;
		// convert data to object
		$data = (object)$data;

		//		dd($data);
		return view('admin.index', compact('data'));
	}
}
