<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DashboardController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Main Routes

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/courses', [MainController::class, 'courses'])->name('courses');

Route::get('/detail/{id}', [MainController::class, 'detail'])->name('detail');

Route::get('/feature', [MainController::class, 'feature'])->name('feature');

Route::get('/team', [MainController::class, 'team'])->name('team');

Route::get('/testimonial', [MainController::class, 'testimonial'])->name('testimonial');

Route::get('/contact', [MainController::class, 'contact'])->name('contact');



//Laravel Breeze

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Count Resourse Controller Route

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('count', CountController::class);
    Route::resource('course', CourseController::class);
    Route::resource('team', TeamController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('students', StudentsController::class);

});

//send message //contact

Route::post('/send/message', [MainController::class, 'sendMessage'])->name('send.message');


//search 

Route::get('/search', function(){
    $value = Request()->get('q');

    if($value != ''){
        $courses = Course::where('courseName', 'LIKE', '%' .$value. '%'  )->get();

        if(count($courses)>0){
            return view('index')
            ;
        }else{
            "NO INFO";
        }
        
    }else{
        return redirect('/');
    }
});


//dashboard


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('mainDashboard');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
