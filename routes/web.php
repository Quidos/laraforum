<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('categories');
});

Route::get('registration', [RegistrationController::class, 'index'])->name('registration');
Route::post('registration', [RegistrationController::class, 'store']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::delete('login', [LoginController::class, 'destroy'])->middleware('auth');

Route::get('categories', [CategoryController::class, 'index'])->name('categories');

Route::get('category/{category}/threads', [ThreadController::class, 'index'])->name('threads');
Route::get('category/{category}/threads/create', [ThreadController::class, 'create'])->name('threads.create');
Route::post('category/{category}/threads/store', [ThreadController::class, 'store'])->name('thread.store');
Route::get('threads/{thread}/show', [ThreadController::class, 'show'])->name('threads.show');

Route::post('thread/{thread}/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::delete('thread/{thread}/posts/{post}/delete', [PostController::class, 'delete'])->name('posts.delete');

Route::get('user/{user:name}', [UserController::class, 'show'])->name('user.show');

Route::get('messages', [MessageController::class, 'noParameter'])->name('messages.noParameter')->middleware('auth');
Route::get('messages/{user}', [MessageController::class, 'index'])->name('messages')->middleware('auth');

Route::get('friendships', [FriendshipController::class, 'index'])->name('friendships')->middleware('auth');
Route::post('friendships/{user}/store', [FriendshipController::class, 'store'])->name('friendships.store');
Route::post('friendships/{user}/accept', [FriendshipController::class, 'accept'])->name('friendships.acccept');
Route::post('friendships/{user}/decline', [FriendshipController::class, 'decline'])->name('friendships.decline');
