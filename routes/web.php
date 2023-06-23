<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\SettingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GalioController::class, 'index_page']);

/*
# Email Verification
*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
	return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');


#sub Setting
Route::prefix('/dashboard/setting')->group(function(){
	Route::get('/update/page/{id}', [SettingController::class, 'update_page'])->middleware('verified');
	Route::post('/update/function/{id}', [SettingController::class, 'update_function'])->middleware('verified');
});



#category
Route::prefix('/dashboard/category')->group(function(){
	Route::get('/insert/page', [CategoryController::class, 'insert_page'])->middleware('verified');
	Route::post('/insert/function', [CategoryController::class, 'insert_function'])->middleware('verified');
	Route::get('/loop', [CategoryController::class, 'loop_page'])->middleware('verified');
	Route::get('/update/page/{id}', [CategoryController::class, 'update_page'])->middleware('verified');
	Route::post('/update/function/{id}', [CategoryController::class, 'update_function'])->middleware('verified');
	Route::get('/remove/{id}', [CategoryController::class, 'remove_function'])->middleware('verified');
});

#sub category
Route::prefix('/dashboard/subcategory')->group(function(){
	Route::get('/insert/page', [SubcategoryController::class, 'insert_page'])->middleware('verified');
	Route::post('/insert/function', [SubcategoryController::class, 'insert_function'])->middleware('verified');
	Route::get('/loop', [SubcategoryController::class, 'loop_page'])->middleware('verified');
	Route::get('/update/page/{id}', [SubcategoryController::class, 'update_page'])->middleware('verified');
	Route::post('/update/function/{id}', [SubcategoryController::class, 'update_function'])->middleware('verified');
	Route::get('/remove/{id}', [SubcategoryController::class, 'remove_function'])->middleware('verified');
});

#sub Brand
Route::prefix('/dashboard/brand')->group(function(){
	Route::get('/insert/page', [BrandController::class, 'insert_page'])->middleware('verified');
	Route::post('/insert/function', [BrandController::class, 'insert_function'])->middleware('verified');
	Route::get('/loop', [BrandController::class, 'loop_page'])->middleware('verified');
	Route::get('/update/page/{id}', [BrandController::class, 'update_page'])->middleware('verified');
	Route::post('/update/function/{id}', [BrandController::class, 'update_function'])->middleware('verified');
	Route::get('/remove/{id}', [BrandController::class, 'remove_function'])->middleware('verified');
});

#sub Product
Route::prefix('/dashboard/product')->group(function(){
	Route::get('/insert/page', [ProductController::class, 'insert_page'])->middleware('verified');
	Route::post('/insert/function', [ProductController::class, 'insert_function'])->middleware('verified');
	Route::get('/loop', [ProductController::class, 'loop_page'])->middleware('verified');
	Route::get('/search', [ProductController::class, 'search_function'])->middleware('verified');
	Route::get('/update/page/{id}', [ProductController::class, 'update_page'])->middleware('verified');
	Route::post('/update/function/{id}', [ProductController::class, 'update_function'])->middleware('verified');
	Route::get('/remove/{id}', [ProductController::class, 'single_remove_function'])->middleware('verified');
	Route::get('/group/remove/', [ProductController::class, 'group_remove_function'])->middleware('verified');
	Route::get('/file/delete/{id}', [ProductController::class, 'fileDelete_function'])->middleware('verified');
});

#sub Ckeditor
Route::get('ckeditor', [CkeditorController::class, 'index']);
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');


#Ajax
Route::prefix('/dashboard/ajax')->group(function(){
	Route::post('/get/subcategory/data', [AjaxController::class, 'subGetByAjax'])->middleware('verified');
});