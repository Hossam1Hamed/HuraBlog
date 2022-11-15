<?php

use App\Http\Controllers\Website\CommentController;
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\Website\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth')->name('website.')->group(function () {
    Route::get('/home', [HomePageController::class, 'index'])->name('home');
    Route::resource('/posts',PostController::class);
    Route::resource('/comments',CommentController::class);
    Route::post('/post-like',[PostController::class,'doLike'])->name('posts.like');
    Route::get('/t', function () {
        event(new \App\Events\PostEvent());
        dd('Event Run Successfully.');
    });
});