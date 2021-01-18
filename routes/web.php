<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PartnerFeatureController;
use App\Http\Controllers\PartnerLinkController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VideoController;


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

Route::get('/', function () { return view('welcome'); });

/*Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
/*Route::group(['middleware'=>['auth']],function(){
	
});
*/


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',function(){
		return "test dashboard";
	});
});

Route::prefix('admin')->middleware(['IsAdmin'])->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::resource('users',UsersController::class);
    Route::resource('lectures',LectureController::class);
    Route::resource('partners',PartnerController::class);
    Route::resource('partners-features',PartnerFeatureController::class);
    Route::resource('partners-links',PartnerLinkController::class);
    Route::resource('courses',CourseController::class);
    Route::resource('videos',VideoController::class);
});




Route::get('/page', function () { return view('pages.page'); });
Route::get('/course', function () { return view('pages.course'); });
Route::get('/carousel', function () { return view('pages.carousel'); });
Route::get('/partners', function () { return view('pages.partners'); });
