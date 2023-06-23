<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	protected $fillable = [
		'name', 
		'title', 
		'category', 
		'subcategory',
		'brand',
		'thumb', 
		'photo', 
		'price', 
		'quantity', 
		'description', 
	];
}
