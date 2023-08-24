<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('login', AuthController::class);
Route::post('register', RegisterController::class);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('logout', LogoutController::class);

    Route::middleware(['abilities:blog_post-list,blog_post-create,blog_post-update,blog_post-delete'])->group(function () {

        Route::apiResource('blog-posts', BlogPostController::class);

    });

});

