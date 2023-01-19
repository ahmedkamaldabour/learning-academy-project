<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\NewsLetterRequest;
use App\Models\Message;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use function alert;
use function dd;
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

	public function contact(ContactFormRequest $request) {
		Message::create([
			'name' => $request->name,
			'email' => $request->email,
			'subject' => $request->subject,
			'message' => $request->message,
		]);
		alert()->success('Done', 'Your message has been sent successfully.');
		return redirect()->back();
	}

}
