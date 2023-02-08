<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	protected Category $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		request()->validate([
			'search' => 'nullable|string|max:50|min:3|regex:/^[a-zA-Z]*$/',
		]);
		$categories = $this->category::withCount('courses')->orderBy('id', 'DESC')->where('name', 'like', '%'.request()->search.'%')->paginate();
		return view('Admin.category.index', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CategoryRequest $request)
	{
		$this->category->create([
			'name'        => $request->name,
			'description' => $request->description,
		]);
		return redirect()->route('admin.category.index')->with('success', 'Category created successfully');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('Admin.category.create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Category $category) {
		return view('Admin.category.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int                       $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(CategoryRequest $request, Category $category) {
		$category->update([
			'name'        => $request->name,
			'description' => $request->description,
		]);
		return redirect()->route('admin.category.index')->with('success', 'Category updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Category $category)
	{
		$category->delete();
		return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully');
	}

}
