<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Setting;



class GalioController extends Controller
{
    public function index_page(){
        return view('galio/home',[
			'category' => Category::all(),
			'subcategory' => Subcategory::all(),
			'brand' => Brand::all(),
			'product' => Product::all(),
			'Setting' => Setting::first()->get(),
		]);
    }
}
