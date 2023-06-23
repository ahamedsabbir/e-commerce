<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Setting;
use IIlluminate\Support\Facades\Storage;
use auth;
use Image;
use rolecheck;

class SettingController extends Controller
{
    public function update_page($id){
		return view('adminto/setting/update', [
			'setting' => Setting::find($id)
		]);
    }
	public function update_function(Request $request, $id){
		if($request->submit == "update"){
			$request->validate(
				[
					'name' => 'required|unique:categories,name|string|max:225', 
					'title' => 'required|unique:categories,title',
					'font_icon' => 'required',
				],
			);
			Setting::find($id)->update([
				'name' => $request->name,
				'title' => $request->title,
				'font_icon' => $request->font_icon,
				'icon' => category_image_update_function($request, Setting::where('id', $id)->get(), 'icon'),
			]);
			return back()->with("alert", "setting update done....");
		}else{
			return redirect('home');
		}
    }
}
