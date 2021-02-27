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
use App\Http\Controllers\CourseReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SocialController;
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

Route::get('/', function () { return view('welcome'); });

/*Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
/*Route::group(['middleware'=>['auth']],function(){
	
});
*/



Route::get('lectures',function(){return view('pages.lectures');});
Route::get('partners',function(){return view('pages.partners');});
Route::get('blog',function(){return view('pages.blog');});
Route::get('article/{id}-{title?}',function($id){$article=\App\Models\Article::where('id',$id)->firstOrFail(); return view('pages.article',compact('article'));})->name('article');
Route::get('course/{id}-{title?}',function($id){$course=\App\Models\Course::where('id',$id)->firstOrFail(); return view('pages.course',compact('course'));})->name('course');

Route::get('course/{id}-{title?}/videos',function($id){$videos=\App\Models\Video::where('course_id',$id)->get();$course=\App\Models\Course::where('id',$id)->firstOrFail(); return view('pages.videos',compact('videos','course'));})->name('videos');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',function(){
		return "test dashboard";
	});  
    Route::get('/payment/success',function(){
        dd(\Request::all());
    })->name('payment.success');
    Route::get('/test',function(){
        return (new PaymentController)->create_payment("MOHALLEL",null,'peter','ptharwat@gmail.com',1);
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
    Route::resource('reviews',CourseReviewController::class);
    Route::resource('orders',OrderController::class);
    Route::resource('payments',PaymentController::class);
    Route::resource('articles',ArticleController::class);
    //Route::resource('socials',SocialController::class);
    Route::resource('settings',SettingController::class);
});




Route::get('/page', function () { return view('pages.page'); });
Route::get('/courses', function () { return view('pages.courses'); });
Route::get('/carousel', function () { return view('pages.carousel'); });
Route::get('/partners', function () { return view('pages.partners'); });
