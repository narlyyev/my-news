<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
	public function creating(Category $category)
	{
		$category->slug = Str::slug($category->name, '-');
		$category->source = '/ ' . $category->getSource();
	}

	public function saving(Category $category)
	{
		$category->slug = Str::slug($category->name, '-');
	}
}
