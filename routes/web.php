<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForntendController;
use App\Http\Controllers\VandorController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
// Route::get('/', function () {
//     return view('forntend.index');
// });

Auth::routes();

Route::get('/', [ForntendController::class, 'forntend'])->name('forntend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::POST('/changenamephoto', [UserController::class, 'changenamephoto'])->name('changenamephoto');
Route::POST('/changepasssword', [UserController::class, 'changepasssword'])->name('changepasssword');
Route::get('/emailloffer', [UserController::class, 'emailloffer'])->name('emailloffer');
Route::get('/emailsingleoffer/{id}', [UserController::class, 'emailsingleoffer'])->name('emailsingleoffer');

Route::resource('category', CategoryController::class);
Route::resource('vandor', VandorController::class);
Route::resource('product', ProductController::class);
