<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainerRequest;
use App\Models\Trainer;
use App\traits\ImageTrait;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use function alert;

class TrainerController extends Controller
{
	use ImageTrait;

	protected Trainer $trainer;

	public function __construct(Trainer $trainer)
	{
		$this->trainer = $trainer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		request()->validate([
			'name'           => 'nullable|string|max:50|regex:/^[a-zA-Z]*$/',
			'email'          => 'nullable|email|max:50',
			'address'        => 'nullable|string|max:50|regex:/^[a-zA-Z]*$/',
			'specialized_at' => 'nullable|string|max:50|regex:/^[a-zA-Z]*$/',
		]);
		$trainers = $this->trainer::orderBy('id', 'DESC')
			->when(request()->name, function ($q) {
				return $q->where('name', 'like', '%'.request()->name.'%');
			})
			->when(request()->email, function ($q) {
				return $q->where('email', 'like', '%'.request()->email.'%');
			})
			->when(request()->address, function ($q) {
				return $q->where('address', 'like', '%'.request()->address.'%');
			})
			->when(request()->specialized_at, function ($q) {
				return $q->where('specialized_at', 'like', '%'.request()->specialized_at.'%');
			})
			->withCount('courses')->paginate();
		//		$trainers = $this->trainer::orderBy('id', 'DESC')->withCount('courses')->paginate();
		//		dd($trainers);

		return view('Admin.trainer.index', compact('trainers'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(TrainerRequest $request)
	{
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$image_name = $this->uploadImage($image, 'trainer', 50, 50);
		}
		$this->trainer->create([
			'name'           => $request->name,
			'email'          => $request->email,
			'phone'          => $request->phone,
			'address'        => $request->address,
			'specialized_at' => $request->specialized_at,
			'image'          => $image_name,
		]);
		alert()->success('Done', 'Trainer Added successfully');
		return redirect()->route('admin.trainers.index')->with('success', 'Trainer created successfully');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('Admin.trainer.create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Trainer $trainer)
	{
		return view('Admin.trainer.edit', compact('trainer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int                       $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(TrainerRequest $request, Trainer $trainer)
	{
		// update image
		//		dd($request->all());
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$image_name = $this->uploadImage($image, 'trainer', 50, 50, $trainer->image);
		}
		$trainer->update([
			'name'           => $request->name,
			'email'          => $request->email,
			'phone'          => $request->phone,
			'address'        => $request->address,
			'specialized_at' => $request->specialized_at,
			'image'          => $image_name ?? $trainer->image,
		]);
		// use alert to show alert message
		alert()->success('Done', 'Trainer updated successfully');
		return redirect()->route('admin.trainers.index')->with('success', 'Trainer updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Trainer $trainer)
	{
		// delete image
		$this->deleteImage($trainer->image, 'trainer');
		$trainer->delete();
		// use alert to show alert message
		alert()->success('Done', 'Trainer deleted successfully');
		return redirect()->route('admin.trainers.index')->with('success', 'Trainer deleted successfully');
	}
}
