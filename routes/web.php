<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\sessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

Route::get('about/{post}', [PostController::class, 'show']);

Route::post('/about/{post}/comment', [CommentController::class, 'store']);

Route::get('register', [registerController::class, 'create'])->middleware('guest');
Route::post('register', [registerController::class, 'store'])->middleware('guest');

Route::post('logout', [sessionsController::class, 'destroy'])->middleware('auth');
Route::get('login', [sessionsController::class, 'create'])->middleware('guest');
Route::post('login', [sessionsController::class, 'store'])->middleware('guest');

Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('/admin/posts/create', [PostController::class, 'store'])->middleware('admin');

Route::get('/admin/posts', [Admincontroller::class, 'index'])->middleware('superadmin');
Route::get('/admin/posts/{post}/edit', [Admincontroller::class, 'edit'])->middleware('superadmin');
Route::patch('/admin/posts/{post}', [Admincontroller::class, 'update'])->middleware('superadmin');
Route::post('/admin/posts/{post}', [Admincontroller::class, 'destroy'])->middleware('superadmin');
