<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Subcategory;
use Image;
use rolecheck;

class AjaxController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
		$this->middleware('rolecheck');
    }
	function subGetByAjax(Request $request){
		$subcategory = Subcategory::where('category', $request->category)->get();
		$send_ajax_data = "<option>select</option>";
		foreach($subcategory as $subcategory_key => $subcategory_value){
			$send_ajax_data .= "<option value='{$subcategory_value->id}'>{$subcategory_value->name}</option>";
		}
		echo $send_ajax_data;
	}
}
