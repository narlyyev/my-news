<?php

namespace App\Http\Controllers\Panel;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	use FileManager;

	public function index()
	{
		$categories = Category::whereNull('parent_id')->with('children')->get();

		return view('panel.categories.index', compact('categories'));
	}

	public function create()
	{
		return view('panel.categories.create');
	}

	public function store(Request $request)
	{
		$data = $request->validate([
			'name' => 'required|array',
			'name.tk' => 'required|string|max:255',
			'name.ru' => 'required|string|max:255',
			'parent_id' => 'nullable|integer|exists:categories,id',
			'image' => 'nullable|file',
			'sort_order' => 'required|integer',
			'is_active' => 'nullable|boolean',
		]);

		$request->has('is_active') ? $data['is_active'] = 1 : $data['is_active'] = 0;

		if (isset($data['image'])) {
			$data['image'] = $this->saveFile($data['image'], 'categories');
		}

		$category = Category::create($data);

		if (!$category->parent_id) {
			$category->update(['source' => $category->id]);
		} else {
			$category->update(['source' => $category->getSource()]);
		}

		return to_route('panel.categories.index')->with('success', 'Category created');
	}

	public function edit(Category $category)
	{
		return view('panel.categories.edit', compact('category'));
	}

	public function update(Request $request, Category $category)
	{
		$data = $request->validate([
			'name' => 'required|array',
			'name.tk' => 'required|string|max:255',
			'name.ru' => 'required|string|max:255',
			'parent_id' => 'nullable|integer|exists:categories,id',
			'image' => 'nullable|file',
			'sort_order' => 'required|integer',
			'is_active' => 'nullable|boolean',
		]);

		$request->has('is_active') ? $data['is_active'] = 1 : $data['is_active'] = 0;

		if ($request->has('image')) {
			$this->deleteFile($category->image, 'categories');
			$data['image'] = $this->saveFile($data['image'], 'categories');
		}

		$category->update($data);

		return to_route('panel.categories.index')->with('success', 'Category updated');
	}

	public function destroy(Category $category)
	{
		$this->deleteFile($category->image, 'categories');
		$category->delete();

		return to_route('panel.categories.index')->with('success', 'Category deleted');
	}
}
