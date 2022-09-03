<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController as AdminPostController;


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

Route::get('/test', function() {
    return view('test');
});

Route::get('/lang/{code}', [AppController::class, "switchLang"]);


Route::middleware('locale')->group(function() {



    Route::get('/', [HomeController::class, "index"]);
    Route::get('/about', [HomeController::class, "about"]);
    Route::get('/dashboard', [HomeController::class, "dashboard"]);
    Route::get('/listing', [PostController::class, "index"]);
    Route::get('/listing/{id}', [PostController::class, "show"]);

    Route::middleware('auth')->group(function() {

        Route::get('/post/create', [PostController::class, "create"]);
        Route::post('/store/post', [PostController::class, "store"]);
        Route::get('/listing/edit/{id}', [PostController::class, "edit"]);
        Route::patch('/post/update/{id}', [PostController::class, "update"]);
        Route::get('/my-post', [PostController::class, "myPost"]);
        Route::get('/listing/delete/{id}', [PostController::class, "Delete"]);

        Route::get('/listing/restore/{id}', [PostController::class, "restore"]);
        Route::get('/listing/empty/{id}', [PostController::class, "empty"]);


    });


    Route::get('/register', [AuthController::class, "registerForm"]);
    Route::post('/register', [AuthController::class, "register"]);
    Route::get('/logout', [AuthController::class, "logout"]);
    Route::get('/login', [AuthController::class, "loginForm"])->name('login');
    Route::post('/login', [AuthController::class, "login"]);


});


Route::prefix('admin')->group(function() {


    Route::get('/login', [AdminController::class, "loginForm"])->name('admin_login');
    Route::post('/login', [AdminController::class, "login"]);


    Route::middleware('auth:admin')->group(function() {

        Route::get('/logout', [AuthController::class, "logout"]);

        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/blank', [DashboardController::class, 'blank']);
        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('/listing', [AdminPostController::class, 'index']);
        Route::get('/listing/response/{status}', [AdminPostController::class, 'response']);


    });

});

