<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\EnrollRequest;
use App\Http\Requests\NewsLetterRequest;
use App\Models\Message;
use App\Models\NewsLetter;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use function alert;
use function auth;
use function dd;
use function redirect;
use function session;

class MessageController extends Controller
{
	public function newsletter(NewsLetterRequest $request)
	{
		NewsLetter::create([
			'email' => $request->email,
		]);
		alert()->success('Done', 'You have successfully subscribed to our newsletter.');
		return redirect()->back();
	}

	public function contact(ContactFormRequest $request)
	{
		Message::create([
			'name'    => auth()->user()->name,
			'email'   => auth()->user()->email,
			'subject' => $request->subject,
			'message' => $request->message,
		]);
		alert()->success('Done', 'Your message has been sent successfully.');
		return redirect()->back();
	}

	public function enroll(EnrollRequest $request)
	{
		//		dd(auth()->user()->name);

		// check if the student has already enrolled in a course
		$student = Student::where('email', auth()->user()->email)->first();
		//		dd($request->all());

		if (!$student) {
			//			dd($student);
			$student = Student::create([
				'name'           => auth()->user()->name,
				'email'          => auth()->user()->email,
				'phone'          => $request->phone,
				'specialized_at' => $request->specialized_at,
			]);
		} else {
			$student->update([
				'phone'          => $request->phone,
				'specialized_at' => $request->specialized_at,
			]);
		}

		$studentCourse = DB::table('course_student')->where('course_id', $request->course_id)
			->where('student_id', $student->id)->first();

		// check if the student has already enrolled in a course
		if (!$studentCourse) {
			// use query builder to insert data into the pivot table
			DB::table('course_student')->insert([
				'course_id'  => $request->course_id,
				'student_id' => $student->id,
				'created_at' => now(),
				'updated_at' => now(),
			]);
			alert()->success('Done', 'You have successfully enrolled in the course.');
			return redirect()->back();
		} else {
			alert()->info('info', 'You have enrolled before in this course.');
			return redirect()->back();
		}

	}

}



// student enroll in course
// if this is the first time the student is enrolling in a course, then create a new record in the student_course table
// if the student has already enrolled in a course, then update the student_course table
// check if the student has already enrolled in a course by checking if the student has a record in the student_course table

