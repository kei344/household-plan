<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UploadImage;
use App\User;

class UploadImageController extends Controller
{
	public function upload(Request $request, $id)
	{
		$request->validate([
			'image' => 'required|file|image'
		]);

		$upload_image = $request->file('image');
		$user = User::find($id);
		$my_upload_image = $user->upload_image;

		if($my_upload_image) {
			if($my_upload_image->user_id === $user->id){
				$my_upload_image_id = $user->upload_image->user_id;
				unlink(storage_path('app/public/'.$my_upload_image->file_path));
				$my_upload_image->delete();

				if($upload_image) {
					//アップロードされた画像を保存する
					$path = $upload_image->store('uploads','public');
					//画像の保存に成功したらDBに記録する
					if($path){
						UploadImage::create([
							"file_name" => $upload_image->getClientOriginalName(),
							"file_path" => $path,
							'user_id' => auth()->id(),
						]);
					}
				}
			}
		} else {
			if($upload_image) {
				//アップロードされた画像を保存する
				$path = $upload_image->store('uploads','public');
				//画像の保存に成功したらDBに記録する
				if($path){
					UploadImage::create([
						"file_name" => $upload_image->getClientOriginalName(),
						"file_path" => $path,
						'user_id' => auth()->id(),
					]);
				}
			}
		}

		return redirect('/');
	}
}
