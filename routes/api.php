<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\AuthController;


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


Route::get('/dashboard/total-post', [DashboardController::class, 'totalPost']);
Route::get('/notification/{id}', [NotificationController::class, 'list']);

Route::get('/post', [PostController::class, 'list']);


Route::middleware('auth:sanctum')->group(function() {

    // Route::get('/post/create', [PostController::class, "create"]);
    // Route::post('/store/post', [PostController::class, "store"]);
    // Route::get('/listing/edit/{id}', [PostController::class, "edit"]);
    // Route::patch('/post/update/{id}', [PostController::class, "update"]);
    Route::get('/my-post', [PostController::class, "myPost"]);
    Route::get('/logout', [AuthController::class, "logout"]);
    // Route::get('/listing/delete/{id}', [PostController::class, "Delete"]);

    // Route::get('/listing/restore/{id}', [PostController::class, "restore"]);
    // Route::get('/listing/empty/{id}', [PostController::class, "empty"]);


});


Route::get('/register', [AuthController::class, "registerForm"]);
Route::post('/register', [AuthController::class, "register"]);
Route::get('/login', [AuthController::class, "loginForm"])->name('login');
Route::post('/login', [AuthController::class, "login"]);