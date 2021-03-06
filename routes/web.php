<?php

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

Route::get('/', [App\Http\Controllers\PostingController::class, 'home']);

Route::get('/post/{id}', [App\Http\Controllers\PostingController::class, 'showPost'])->name('post');

Route::post('/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('comment');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posting', App\Http\Controllers\PostingController::class)->middleware('auth');