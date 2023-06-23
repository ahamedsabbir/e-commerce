<?php
/*
# installation file upload function
*/
function file_insert_function($request, $name, $data = null){
	$file_name = "";
	$file_temp = $request->file($name);
	if($file_temp != null){
		if(is_array($file_temp)){
			foreach($file_temp as $file_loop){
				$file_move = time().rand(99999, 10000).".".$file_loop->getClientOriginalExtension();
				$file_name .= $file_move.", ";
				$file_loop->move(public_path('uploads/'), $file_move);
			}
		}else{
			$file_name = time().rand(99999, 10000).".".$file_temp->getClientOriginalExtension();
			$file_temp->move(public_path('uploads/'), $file_name);
		}
	}
	if($data != null){
		foreach($data AS $data_value){
			if($data_value->$name != ''){
				$file_name = $data_value->$name.", ".$file_name.", ";
			}
		}
	}
	$file_name = rtrim($file_name, ", ");
	return $file_name;
}
function file_update_function($request, $data, $name){
	if($request->file($name) != null){
		foreach($data AS $data_value){
			if(file_exists(public_path()."/uploads/".$data_value->$name)){
				unlink(public_path()."/uploads/".$data_value->$name);
			}
		}
		$file_temp = $request->file($name);
		$file_name = time().rand(99999, 10000).".".$file_temp->getClientOriginalExtension();
		$file_temp->move(public_path('uploads/'), $file_name);
	}else{
		foreach($data AS $data_value){
			$file_name = $data_value->$name;
		}
	}
	return $file_name;
}
function file_delete_function($data, $name, $file = null){
	foreach($data AS $data_value){
		$i = 0;
		$file_array = explode(", ", $data_value->$name);
		foreach($file_array as $file_key => $file_value){
				if($file != null){
					if($file_array[$i] == $file){
						if(in_array($file, $file_array)){
							if(file_exists(public_path()."/uploads/".$file_value)){
								unlink(public_path()."/uploads/".$file);
								unset($file_array[$file_key]);
							}
						}
					}
				}else{
					if(file_exists(public_path()."/uploads/".$file_value)){
						unlink(public_path()."/uploads/".$file_value);
						unset($file_array[$file_key]);
					}
				}
			$i++;
		}
		if(empty($file_array)){
			$file_string = '';
		}else{
			$file_string = implode(", ", $file_array);
			$file_string = rtrim($file_string, ", ");
		}
		return $file_string;
	}
}
?>