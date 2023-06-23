<?php
/*
# custom function
*/
function naturalDate($date){
	$date1 = strtr($date, '/', '-');
	return date('d/m/Y', strtotime($date1));
}
function text_shorten($text, $limit = 400){
	$text = $text. " ";
	$text = substr($text, 0, $limit);
	$text = substr($text, 0, strrpos($text, ' '));
	return $text."...";
}
function remove_tag($text){
	$text = strip_tags(htmlspecialchars_decode(stripslashes($text)));
	return $text;
}
/*
# installation image upload function
*/
function image_insert_function($request, $data){
	$file_temp = $request->file($data);
	$file_name = time().rand(99999, 10000).".".$file_temp->getClientOriginalExtension();
	Image::make($file_temp)->save(base_path("public/uploads/".$file_name));
	return $file_name;
}
function image_update_function($request, $data, $name){
	if($request->file($name) != null){
		foreach($data AS $data_value){
			if(file_exists(public_path()."/uploads/".$data_value->$name)){
				unlink(public_path()."/uploads/".$data_value->$name);
			}
		}
		$file_temp = $request->file($name);
		$file_name = time().rand(99999, 10000).".".$file_temp->getClientOriginalExtension();
		Image::make($file_temp)->save(base_path("public/uploads/".$file_name));
	}else{
		foreach($data AS $data_value){
			$file_name = $data_value->$name;
		}
	}
	return $file_name;
}
function image_delete_function($data, $name){
	foreach($data AS $data_value){
		if(file_exists(public_path()."/uploads/".$data_value->$name)){
			unlink(public_path()."/uploads/".$data_value->$name);
		}
	}
}
/*
# category file upload function
*/
function category_image_insert_function($request, $name){
	$file_temp = $request->file($name);
	$file_name = time().rand(99999, 10000).".".$file_temp->getClientOriginalExtension();
	$medium = Image::make($file_temp);
	$medium->resize(300, 300, function ($constraint) {
        $constraint->aspectRatio();
    });
	$medium->save(base_path("public/uploads/".$file_name));
	return $file_name;
}
function category_image_update_function($request, $data, $name){
	if($request->file($name) != null){
		foreach($data AS $data_value){
			if(file_exists(public_path()."/uploads/".$data_value->$name)){
				unlink(public_path()."/uploads/".$data_value->$name);
			}
		}
      	$file_temp = $request->file($name);
		$file_name = time().rand(99999, 10000).".".$file_temp->getClientOriginalExtension();
		$medium = Image::make($file_temp);
		$medium->resize(300, 300, function ($constraint) {
			$constraint->aspectRatio();
		});
		$medium->save(base_path("public/uploads/".$file_name));
	}else{
		foreach($data AS $data_value){
			$file_name = $data_value->$name;
		}
	}
	return $file_name;
}
function category_delete_function($data, $name){
	foreach($data AS $data_value){
		if(file_exists(public_path()."/uploads/".$data_value->$name)){
			unlink(public_path()."/uploads/".$data_value->$name);
		}
	}
}