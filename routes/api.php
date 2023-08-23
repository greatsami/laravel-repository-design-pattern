<?php

use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;


Route::apiResource('blog-posts', BlogPostController::class)->except(['create', 'edit']);
