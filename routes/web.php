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
use App\Http\Controllers\AccessController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;




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


Route::get('support',function(){return view('another.support');});
Route::get('lectures',function(){return view('pages.lectures');});
Route::get('partners',function(){return view('pages.partners');});
Route::get('blog',function(){return view('pages.blog');});
Route::get('article/{id}-{title?}',function($id){$article=\App\Models\Article::where('id',$id)->firstOrFail(); return view('pages.article',compact('article'));})->name('article');

Route::get('article/{id}-{title?}',function($id){$article=\App\Models\Article::where('id',$id)->firstOrFail(); return view('pages.article',compact('article'));})->name('article');
Route::get('idea/{id}-{title?}',function($id){$article=\App\Models\Article::where('id',$id)->firstOrFail(); return view('pages.idea',compact('article'));})->name('idea');


Route::get('course/{id}-{title?}',function($id){$course=\App\Models\Course::where('id',$id)->withCount('ratings')->withSum('ratings','rate')->with('ratings')->firstOrFail();
    if($course->type=="OFFLINE")
        return view('pages.single-attendance',compact('course'));
    return view('pages.course',compact('course'));
})->name('course');
Route::get('partner/{id}-{title?}',function($id){$partner=\App\Models\Partner::where('id',$id)->firstOrFail(); return view('pages.partner',compact('partner'));})->name('partner');

Route::get('course/{id}-{title?}/videos',function($id){$videos=\App\Models\Video::where('course_id',$id)->get();$course=\App\Models\Course::where('id',$id)->withCount('ratings')->withSum('ratings','rate')->firstOrFail();

     return view('pages.videos',compact('videos','course'));})->name('videos');



Route::middleware(['auth'])->group(function () {

    
    Route::post('/rate/create',[ReviewController::class,'store'])->name('rate.create');
    Route::get('/dashboard',function(){
        return view('dash.user-dashboard');
	});  
    Route::get('/user/courses',function(){
        return view('dash.courses');
    }); 
    Route::get('/user/subscriptions',function(){
        return view('dash.subscriptions');
    });
    Route::get('/user/invoices',function(){
        return view('dash.invoices');
    }); 
    Route::get('/user/settings',function(){
        return view('dash.settings');
    }); 
    Route::post('user-profile/update-info',[ProfileController::class,'update_info'])->name('user-profile.update-info');
    Route::post('user-profile/update-email',[ProfileController::class,'update_email'])->name('user-profile.update-email');
    Route::post('user-profile/update-password',[ProfileController::class,'update_password'])->name('user-profile.update-password');


    
    Route::post('/make-payment',[PaymentController::class,'make'])->name('make.payment');


    Route::get('/payment/success',[PaymentController::class,'success'])->name('payment.success');
    /*Route::get('/payment/success',function(){
        dd(\Request::all());
    })->name('payment.success');*/

    Route::get('/test',function(){
        return (new PaymentController)->create_payment("MOHALLEL",null,'peter','ptharwat@gmail.com',1);
    });
});



Route::prefix('admin')->middleware(['IsAdmin'])->group(function () {
    Route::get('users/export/',[UsersController::class,'export'])->name('export.users');
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
    Route::get('/contacts',[ContactController::class,'index'])->name('contacts.index');
    Route::get('/contact/{contact}',[ContactController::class,'show'])->name('contacts.show');
    Route::post('/see/notifications',[NotificationController::class,'see'])->name('see.notifications');
    Route::post('/payments-export',[PaymentController::class,'export'])->name('payments.export');

});

Route::get('/checkout', function () { return view('another.checkout'); });
Route::get('/subscriptions', function () { return view('another.subscriptions'); });
Route::get('/mohallel', function () { return view('another.mohallel'); });
Route::get('/about', function () { return view('another.about'); });
Route::get('/terms', function () { return view('another.terms'); });
Route::get('/privacy', function () { return view('another.privacy'); });

Route::post('/get_video_access_url',[AccessController::class,'get_video_url'])->name('get_video_access_url');


Route::get('/page', function () { return view('pages.page'); });
Route::get('/filter', function () { return view('pages.filter'); });
Route::get('/courses', function () { return view('pages.courses'); })->name('courses'); 
Route::get('/carousel', function () { return view('pages.carousel'); });
Route::get('/partners', function () { return view('pages.partners'); });



Route::post('/contact/create',[ContactController::class,'store'])->name('contact.create');
Route::get('/ideas', function () { return view('pages.ideas'); });
Route::get('/lectures', function () { return view('pages.lectures'); });
Route::get('/recorded-courses', function () { return view('pages.recorded-courses'); });
Route::get('/live-trading', function () { return view('pages.live-trading'); });
Route::get('/single-attendance', function () { return view('pages.single-attendance'); });
/*Route::get('/subscrpitions', function () { return view('pages.subscrpitions'); });*/
Route::get('/offline-courses', function () { return view('pages.offline-courses'); });



