<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\CommentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    // Route::view('/home','homepage');

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::post('/posts', [PostController::class, 'store']);

    Route::get('/posts/{post}/comments', [PostController::class, 'show'])->name('post-detail');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comment');

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('update');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('destroy');

    // Route::get('/posts/{post}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('edit-comment');
    // Route::put('/posts/{post}/comments/{comment}', [CommentController::class, 'update'])->name('update-comment');
    // Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])->name('destroy-comment');
    
    // Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments-update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comment-delete');
});
