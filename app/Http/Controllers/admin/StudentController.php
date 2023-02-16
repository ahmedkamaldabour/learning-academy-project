<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function alert;

class StudentController extends Controller
{

	protected Student $student;

	public function __construct(Student $student)
	{
		$this->student = $student;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//		$students = $this->student->orderBy('id', 'desc')->paginate();
		// search for students
		request()->validate([
			'name'           => 'nullable|string|max:50|regex:/^[a-zA-Z]*$/',
			'email'          => 'nullable|email|max:50',
			'specialized_at' => 'nullable|string|max:50|regex:/^[a-zA-Z]*$/',
		]);
		$students = $this->student::orderBy('id', 'DESC')
			->when(request()->name, function ($q) {
				return $q->where('name', 'like', '%'.request()->name.'%');
			})
			->when(request()->email, function ($q) {
				return $q->where('email', 'like', '%'.request()->email.'%');
			})
			->when(request()->specialized_at, function ($q) {
				return $q->where('specialized_at', 'like', '%'.request()->specialized_at.'%');
			})
			->paginate();
		return view('admin.students.index', compact('students'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StudentRequest $request)
	{
		$this->student->create($request->all());
		alert()->success('Student created successfully', 'Success');
		return redirect()->route('admin.students.index')->with('success', 'Student created successfully');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.students.create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Student $student)
	{
		return view('admin.students.edit', compact('student'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Student $student)
	{
		// delete student
		$student->delete();
		alert()->success('Student deleted successfully', 'Success');
		return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully');
	}

	/**
	 * @param  Student  $student
	 */
	public function show(Student $student)
	{
		// show student courses
		$enrollments = $student->courses()->get();
		return view('admin.students.show', compact('student', 'enrollments'));
	}

	public function approve(Student $student, Course $course)
	{
		//		dd($student, $course);
		// approve student in student_course table
		DB::table('course_student')
			->where('student_id', $student->id)
			->where('course_id', $course->id)
			->update(['status' => 'approve']);
		alert()->info('Student approved successfully');
		return redirect()->back()->with('success', 'Student approved successfully');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int                       $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(StudentRequest $request, Student $student)
	{
		$student->update($request->all());
		alert()->success('Student updated successfully');
		return redirect()->route('admin.students.index')->with('success', 'Student updated successfully');
	}

	public function reject(Student $student, Course $course)
	{

		// reject student in student_course table
		DB::table('course_student')
			->where('student_id', $student->id)
			->where('course_id', $course->id)
			->update(['status' => 'reject']);
		alert()->info('Student rejected successfully');
		return redirect()->back()->with('success', 'Student rejected successfully');
	}

	public function enrollForm(Student $student)
	{
		// Show courses he can enroll in
		$courses = Course::whereDoesntHave('students', function ($query) use ($student) {
			$query->where('student_id', $student->id);
		})->get();
		return view('admin.students.enroll', compact('student', 'courses'));
	}

	public function enroll(Request $request, Student $student)
	{
		// validate request
		$request->validate([
			// check the sudent can enroll in this course
			'course_id' => 'required',
		]);
		// check is student exist
		$studentExist = DB::table('course_student')
			->where('student_id', $student->id)
			->where('course_id', $request->course_id)
			->exists();
		if ($studentExist) {
			alert()->error('Student already enrolled in this course');
			return redirect()->back()->with('error', 'Student already enrolled in this course');
		}
		DB::table('course_student')->insert(
			[
				'student_id' => $student->id,
				'course_id'  => $request->course_id,
				'created_at' => now(),
				'updated_at' => now(),
			]
		);
		alert()->success('Student enrolled successfully');
		return redirect()->back()->with('success', 'Student enrolled successfully');
	}

}
