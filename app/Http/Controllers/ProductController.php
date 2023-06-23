<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;
use IIlluminate\Support\Facades\Storage;
use auth;
use Image;
use rolecheck;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
		$this->middleware('rolecheck');
    }
	public function index_page(){
		return view('adminto/index', [
			'category' => Category::all(),
			'subcategory' => Subcategory::all(),
			'brand' => Brand::all()
		]);
    }
	public function insert_page(){
		return view('adminto/product/insert', [
			'category' => Category::all(),
			'subcategory' => Subcategory::all(),
			'brand' => Brand::all()
		]);
    }
	public function insert_function(Request $request){
		if($request->submit == "insert"){
			$request->validate([
					'name' => 'required|unique:products,name|string|max:225',
					'title' => 'required|string|max:225',
					'category' => 'required',
					'subcategory' => 'required',
					'price' => 'required',
					'brand' => 'required',
					'quantity' => 'required',
					'description' => 'required',
					'thumb' => 'file|mimes:jpg,bmp,png,jpeg'
				],
			);
			Product::insert([
				"name" => $request->name,
				"title" => $request->title,
				"category" => $request->category,
				"subcategory" => $request->subcategory,
				"price" => $request->price,
				"brand" => $request->brand,
				"quantity" => $request->quantity,
				"description" => $request->description,
				"thumb" => file_insert_function($request, 'thumb'),
				"photo" => file_insert_function($request, 'photo'),
				"created_at" => Carbon::now()
			]);
			return redirect('dashboard/product/loop')->with('success', 'product add success');
		}else{
			return redirect('home')->with('success', 'product not insert');
		}
    }
	public function loop_page(){
		return view('adminto/product/loop', [
			'product' => Product::latest()->paginate(24, ['*'], 'catrgories')
		]);
    }
	public function update_page($id){
		return view('adminto/product/update', [
			'product' => Product::find($id),
			'category' => Category::all(),
			'subcategory' => Subcategory::all(),
			'brand' => Brand::all()
		]);
    }
	public function update_function(Request $request, $id){
		if($request->submit == "update"){
			$request->validate(
				[
					'name' => 'required|unique:products,name|string|max:225',
					'title' => 'required|string|max:225',
					'category' => 'required',
					'subcategory' => 'required',
					'price' => 'required',
					'brand' => 'required',
					'quantity' => 'required',
					'description' => 'required',
					'thumb' => 'file|mimes:jpg,bmp,png',
					'photos' => 'file|mimes:jpeg,jpg,bmp,png'
				],
			);
			Product::find($id)->update([
				"name" => $request->name,
				"title" => $request->title,
				"category" => $request->category,
				"subcategory" => $request->subcategory,
				"price" => $request->price,
				"brand" => $request->brand,
				"quantity" => $request->quantity,
				"description" => $request->description,
				"thumb" => file_update_function($request, Product::where('id', $id)->get(), 'thumb'),
				"photo" => file_insert_function($request, 'photo', Product::where('id', $id)->get())
			]);
			return back()->with("alert", "product update done....");
		}else{
			return redirect('home');
		}
    }
	public function search_function(){
		$keyword = $_GET['keyword'];
		return view('dashboard/product/loop', [
			"product" => Product::where("name", "like", "%$keyword%")->get()
		]);
	}
	public function single_remove_function($id){
		file_delete_function(Product::where('id', $id)->get(), 'thumb');
		file_delete_function(Product::where('id', $id)->get(), 'photo');
		Product::find($id)->forceDelete();
		return redirect('dashboard/product/loop')->with('success', 'product delete success');
    }
	public function group_remove_function(){
		$group = $_GET['product'];
		foreach($group as $id){
			file_delete_function(Product::where('id', $id)->get(), 'thumb');
			file_delete_function(Product::where('id', $id)->get(), 'photo');
			Product::find($id)->forceDelete();
		}
		return redirect('dashboard/product/loop')->with('success', 'product delete success');
    }
	public function fileDelete_function($id){
		$file = $_GET['file'];
		Product::find($id)->update([
			"photo" => file_delete_function(Product::where('id', $id)->get(), 'photo', $file)
		]);
		return back()->with('success', 'product delete success');
    }
}
