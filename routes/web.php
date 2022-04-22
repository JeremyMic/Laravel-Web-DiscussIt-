<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>'login'],function(){
    Route::get('/logout',[\App\Http\Controllers\UserController::class, 'logout']);

    Route::post('/add-reply',[\App\Http\Controllers\ReplyController::class, 'addReply']);

    Route::get('/create-post', [MainController::class, 'createPost']);
    Route::post('/create-post', [PostController::class, 'validatePost'])->name('validatePost');

    Route::get('/upVote/{id}', [VoteController::class, 'doUpVote']);
    Route::get('/downVote/{id}', [VoteController::class, 'doDownVote']);

    Route::get('/profile/{id}',[\App\Http\Controllers\UserController::class, 'profile']);
});

Route::group(['middleware'=>'guest'],function(){
    Route::get('/login', [\App\Http\Controllers\MainController::class, 'loginPage']);
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'loginValidate']);

    Route::get('/register', [\App\Http\Controllers\MainController::class, 'registerPage']);
    Route::post('/register', [\App\Http\Controllers\UserController::class, 'registerValidate'])->name('registerValidate');
});

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);

Route::get('/replies/{id}', [\App\Http\Controllers\ReplyController::class, 'replies']);

Route::get('/search',[\App\Http\Controllers\PostController::class, 'search']);
Route::get('/filter',[\App\Http\Controllers\PostController::class, 'filter']);

Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'viewCategory']);
Route::get('/{id}', [\App\Http\Controllers\CategoryController::class, 'viewPostCategory']);