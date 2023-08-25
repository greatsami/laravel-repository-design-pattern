<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('login', AuthController::class)->name('auth.login');
Route::post('register', RegisterController::class)->name('auth.register');

Route::get('blog-posts', [BlogPostController::class, 'index'])->name('blog-posts.index');
Route::get('blog-posts/{blog_post}', [BlogPostController::class, 'show'])->name('blog-posts.show');

Route::middleware('auth:sanctum')->group(function () {

    Route::post('logout', LogoutController::class)->name('auth.logout');


    Route::post('blog-posts', [BlogPostController::class, 'store'])->name('blog-posts.store')->middleware(['ability:blog_post-create']);
    Route::patch('blog-posts/{blog_post}', [BlogPostController::class, 'update'])->name('blog-posts.update')->middleware(['ability:blog_post-update']);
    Route::delete('blog-posts/{blog_post}', [BlogPostController::class, 'destroy'])->name('blog-posts.destroy')->middleware(['ability:blog_post-delete']);

});

