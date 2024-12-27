<?php


namespace App\Http\Controllers\Panel;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait FileManager
{
	public function saveFile($file, $folder)
	{
		$name = Str::random();
		$array_name = explode('.', $file->getClientOriginalName());
		$name = $name . '.' . end($array_name);

		Storage::putFileAs("public/$folder", $file, $name);

		return $name;
	}

	public function deleteFile($file, $folder)
	{
		Storage::delete("public/$folder/". $file);
	}
}
