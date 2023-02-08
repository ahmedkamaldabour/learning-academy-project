<?php

namespace App\traits;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use function file_exists;
use function public_path;
use function time;
use function unlink;

trait ImageTrait
{
	/**
	 * @param  string  $image
	 * @return string
	 */
	public function uploadImage(UploadedFile $image, string $path, $width, $height, string|null $old_image = null):string
	{
		if ($old_image != null) {
			$this->deleteImage($old_image, $path);
		}
		$filename = time().'_'.$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
		$location = public_path('uploaded'."/$path/$filename");
		Image::make($image)->resize($width, $height)->save($location);
		return $filename;
	}

	/**
	 * @param  string  $image
	 * @param  string  $path
	 */
	public function deleteImage(string $old_image, string $path)
	{
		if ($old_image) {
			$old_image_path = public_path('uploaded'."/$path/$old_image");
			if (file_exists($old_image_path)) {
				unlink($old_image_path);
			}
		}
	}
}