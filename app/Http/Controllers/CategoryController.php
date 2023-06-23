<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use IIlluminate\Support\Facades\Storage;
use auth;
use Image;
use rolecheck;


class CategoryController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
		$this->middleware('rolecheck');
    }
	public function index_page(){
		return view('adminto/index');
    }
	public function insert_page(){
		return view('adminto/category/insert');
    }
	public function insert_function(Request $request){
		if($request->submit == "insert"){
			$request->validate(
				[
					'name' => 'required|unique:categories,name|string|max:225', 
					'title' => 'required|string',
					'font_icon' => 'required|string',
					'icon' => 'file|mimes:jpg,bmp,png'
				],
			);
			Category::insert([
				"name" => $request->name,
				"title" => $request->title,
				"font_icon" => $request->font_icon,
				"icon" => category_image_insert_function($request, 'icon'),
				"created_at" => Carbon::now()
			]);
			return redirect('dashboard/category/loop')->with('success', 'category add success');
		}else{
			return redirect('home')->with('success', 'category not insert');
		}
    }
	public function loop_page(){
		return view('adminto/category/loop', [
			'category' => Category::latest()->paginate(24, ['*'], 'catrgories')
		]);
    }
	public function update_page($id){
		return view('adminto/category/update', [
			'category' => Category::find($id)
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
			Category::find($id)->update([
				'name' => $request->name,
				'title' => $request->title,
				'font_icon' => $request->font_icon,
				'icon' => category_image_update_function($request, Category::where('id', $id)->get(), 'icon'),
			]);
			return back()->with("alert", "category update done....");
		}else{
			return redirect('home');
		}
    }
	public function search_function(){
		$keyword = $_GET['keyword'];
		return view('adminto/category/loop', [
			"category" => Category::where("name", "like", "%$keyword%")->get()
		]);
	}
	public function remove_function($id){
		image_delete_function(Category::where('id', $id)->get(), 'icon');
		Category::find($id)->forceDelete();
		return redirect('dashboard/category/loop')->with('success', 'category delete success');
    }
}
