<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory, HasTranslations;

	protected $fillable = ['parent_id', 'name', 'source', 'image', 'sort_order', 'slug', 'is_active'];

	protected $translatable = ['name'];

	public $timestamps = false;

	public function parent()
	{
		return $this->belongsTo(Category::class, 'parent_id', 'id');
	}

	public function children()
	{
		return $this->hasMany(Category::class, 'parent_id', 'id');
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}

	public function getPath($category = null, $name = null)
	{
		$category = $category ?? $this;
		$name = $name ?? $this->name;

		if ($category->parent_id == null) {
			return $name;
		} else {
			$name = $category->parent->name . ' \ ' . $name;
		}

		return $this->getPath($category->parent, $name);
	}


	public function getSource($category = null, $ids = null)
	{
		$category = $category ?? $this;
		$ids = $ids ?? $this->id;

		if ($category->parent_id == null) {
			return $ids . ' / ';
		} else {
			$ids = $category->parent_id . ' / ' . $ids;
		}

		return $this->getSource($category->parent, $ids);
	}

	public function getLinkPath($category = null, $name = null)
	{
		$category = $category ?? $this;
		$name = $name ?? $this->name;

		if ($category->parent_id == null) {
			return $name;
		} else {
			$name = "<a class='a-parent text-dark hover_my_color' href='" . route("category.show", $category->parent->slug) . "'>" . $category->parent->name . "</a>" . ' / ' . '<span class="a-category">' . $name . '</span>';
		}

		return $this->getLinkPath($category->parent, $name);
	}

	public function getImgUrlAttribute()
	{
		return Storage::url("public/categories/$this->image");
	}
}
