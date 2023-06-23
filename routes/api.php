<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BrandController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


#sub Brand
/*Route::prefix('/dashboard/brand')->group(function () {
	Route::get('/insert/page', [BrandController::class, 'insert_page']);
	Route::post('/insert/function', [BrandController::class, 'insert_function']);
	Route::get('/loop', [BrandController::class, 'loop_page']);
	Route::get('/update/page/{id}', [BrandController::class, 'update_page']);
	Route::post('/update/function/{id}', [BrandController::class, 'update_function']);
	Route::get('/remove/{id}', [BrandController::class, 'remove_function']);
});*/
