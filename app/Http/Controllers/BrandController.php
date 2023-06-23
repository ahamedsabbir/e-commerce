<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Brand;
use IIlluminate\Support\Facades\Storage;
use auth;
use Image;
use rolecheck;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
		$this->middleware('rolecheck');
    }
	public function index_page(){
		return view('adminto/index');
    }
	public function insert_page(){
		return view('adminto/brand/insert');
    }
	public function insert_function(Request $request){
		if($request->submit == "insert"){//
			$request->validate(
				[
					'name' => 'required|unique:categories,name|string|max:225', 
					'title' => 'required|string',
					'font_icon' => 'required|string',
					'icon' => 'file|mimes:jpg,bmp,png'
				],
			);
			Brand::insert([
				"name" => $request->name,
				"title" => $request->title,
				"font_icon" => $request->font_icon,
				"icon" => category_image_insert_function($request, 'icon'),
				"created_at" => Carbon::now()
			]);
			return redirect('dashboard/brand/loop')->with('success', 'brand add success');
		}else{
			return redirect('home')->with('success', 'brand not insert');
		}
    }
	public function loop_page(){
		return view('adminto/brand/loop', [
			'brand' => Brand::latest()->paginate(24, ['*'], 'catrgories')
		]);
    }
	public function update_page($id){
		return view('adminto/brand/update', [
			'brand' => Brand::find($id)
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
			Brand::find($id)->update([
				'name' => $request->name,
				'title' => $request->title,
				'font_icon' => $request->font_icon,
				'icon' => category_image_update_function($request, Brand::where('id', $id)->get(), 'icon'),
			]);
			return back()->with("alert", "brand update done....");
		}else{
			return redirect('home');
		}
    }
	public function search_function(){
		$keyword = $_GET['keyword'];
		return view('adminto/brand/loop', [
			"brand" => Brand::where("name", "like", "%$keyword%")->get()
		]);
	}
	public function remove_function($id){
		image_delete_function(Brand::where('id', $id)->get(), 'icon');
		Brand::find($id)->forceDelete();
		return redirect('dashboard/brand/loop')->with('success', 'brand delete success');
    }
}
