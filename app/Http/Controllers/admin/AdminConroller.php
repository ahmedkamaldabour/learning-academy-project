<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use function view;

class AdminConroller extends Controller
{

	protected User $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// get all users from database that are admins
		$admins = $this->user::where('status', 'admin')->paginate();
		return view('Admin.dashboard.admins.index', compact('admins'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(AdminRequest $request)
	{
		// add new admin to database and redirect to index page
		$this->user::create([
			'name'     => $request->name,
			'email'    => $request->email,
			'password' => bcrypt($request->password),
			'status'   => 'admin',
		]);
		alert()->success('تم اضافة المشرف بنجاح', 'تمت العملية بنجاح');
		return redirect()->route('admin.admins.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('Admin.dashboard.admins.create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $admin)
	{
		// check his status is admin
		if ($admin->status != 'admin') {
			alert()->error('هذا المستخدم ليس مشرف', 'خطأ');
			return redirect()->route('admin.admins.index');
		}
		return view('Admin.dashboard.admins.edit', compact('admin'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int                       $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(AdminRequest $request, User $admin)
	{
		// update admin data and redirect to index page
		$admin->update([
			'name'  => $request->name,
			'email' => $request->email,
		]);
		// check if password is not empty
		if ($request->password != null) {
			$admin->update([
				'password' => bcrypt($request->password),
			]);
		}
		alert()->success('تم تعديل بيانات المشرف بنجاح', 'تمت العملية بنجاح');
		return redirect()->route('admin.admins.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $admin)
	{
		// check his status is admin
		if ($admin->status != 'admin') {
			alert()->error('هذا المستخدم ليس مشرف', 'خطأ');
			return redirect()->route('admin.admins.index');
		}
		// delete admin from database and redirect to index page
		$admin->delete();
		alert()->success('تم حذف المشرف بنجاح', 'تمت العملية بنجاح');
		return redirect()->route('admin.admins.index');
	}
}
