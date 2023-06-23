<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Subcategory;
use IIlluminate\Support\Facades\Storage;
use auth;
use Image;
use rolecheck;

class SubcategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
		$this->middleware('rolecheck');
    }
	public function index_page(){
		return view('adminto/index');
    }
	public function insert_page(){
		return view('adminto/subcategory/insert',[
			'category' => Category::all()
		]);
    }
	public function insert_function(Request $request){
		if($request->submit == "insert"){//
			$request->validate(
				[
					'name' => 'required|unique:categories,name|string|max:225', 
					'title' => 'required|string',
					'category' => 'required|string',
					'font_icon' => 'required|string',
					'icon' => 'file|mimes:jpg,bmp,png'
				],
			);
			Subcategory::insert([
				"name" => $request->name,
				"title" => $request->title,
				"category" => $request->category,
				"font_icon" => $request->font_icon,
				"icon" => category_image_insert_function($request, 'icon'),
				"created_at" => Carbon::now()
			]);
			return redirect('dashboard/subcategory/loop')->with('success', 'subcategory add success');
		}else{
			return redirect('home')->with('success', 'subcategory not insert');
		}
    }
	public function loop_page(){
		return view('adminto/subcategory/loop', [
			'subcategory' => Subcategory::latest()->paginate(24, ['*'], 'catrgories')
		]);
    }
	public function update_page($id){
		return view('adminto/subcategory/update', [
			'subcategory' => Subcategory::find($id),
			'category' => Category::all()
		]);
    }
	public function update_function(Request $request, $id){
		if($request->submit == "update"){
			$request->validate(
				[
					'name' => 'required|unique:categories,name|string|max:225', 
					'title' => 'required|unique:categories,title',
					'category' => 'required',
					'font_icon' => 'required',
				],
			);
			Subcategory::find($id)->update([
				'name' => $request->name,
				'title' => $request->title,
				'category' => $request->category,
				'font_icon' => $request->font_icon,
				'icon' => category_image_update_function($request, Subcategory::where('id', $id)->get(), 'icon'),
			]);
			return back()->with("alert", "subcategory update done....");
		}else{
			return redirect('home');
		}
    }
	public function search_function(){
		$keyword = $_GET['keyword'];
		return view('adminto/subcategory/loop', [
			"category" => Subcategory::where("name", "like", "%$keyword%")->get()
		]);
	}
	public function remove_function($id){
		image_delete_function(Subcategory::where('id', $id)->get(), 'icon');
		Subcategory::find($id)->forceDelete();
		return redirect('dashboard/subcategory/loop')->with('success', 'subcategory delete success');
    }
}
