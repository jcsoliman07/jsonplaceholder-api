<?php

use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Group Routes for Users
Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

//Group Routes for Post
Route::prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    
    Route::get('/{postId}/comments', [CommentController::class, 'indexByPost']);
});

//Group Routes for Comments
Route::prefix('comments')->controller(CommentController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

//Group Routes for Albums
Route::prefix('albums')->controller(AlbumController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

//Group Routes for Photo
Route::prefix('photos')->controller(PhotoController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

//Group Routes for Todo
Route::prefix('todos')->controller(TodoController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});