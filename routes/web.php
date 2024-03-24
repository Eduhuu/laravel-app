<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ForgotPasswordController;
use \App\Http\Controllers\AdminController;

Route::get('login', [LoginController::class, "create"])->middleware('guest')->name('login.create');
Route::get('login', [LoginController::class, "create"])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, "store"])->middleware('guest')->name('login.store');
Route::delete('login', [LoginController::class, "destroy"])->name('login.destroy');

Route::get('/forgot-password', [ForgotPasswordController::class,"show"])->middleware('guest')->name('forgotpassword.show');
Route::post('/forgot-password',[ForgotPasswordController::class,"store"] )->middleware('guest')->name('forgotpassword.send');
Route::get('/forgot-password/{token}', [ForgotPasswordController::class,"edit"])->middleware('guest')->name('password.reset');
Route::put('/forgot-password', [ForgotPasswordController::class,"update"])->middleware('guest')->name('forgotpassword.update');

Route::get('/', [IndexController::class, "index"])->middleware(['auth'])->name('home');
// Route::get('/user',[UserController::class, 'index'])->name('user.index');
// Route::get('/user/create',[UserController::class, 'create'])->name('user.create');
// Route::post('/user',[UserController::class, 'store'])->name('user.store');
// Route::get('/user/{id}',[UserController::class, 'show'])->name('user.show');
// Route::get('/user/{id}/edit',[UserController::class, 'edit'])->name('user.edit');
// Route::put('/user/{id}',[UserController::class, 'update'])->name('user.update');
// Route::delete('/user/{id}',[UserController::class, 'destroy'])->name('user.destroy');

Route::resource("user", UserController::class);
Route::resource("publication", PublicationController::class)->middleware(["auth"]);
Route::resource("comment", CommentController::class)->middleware(["auth"]);
// Route::post('comment', [CommentController::class, "store"])->name('comment.store');
// Route::delete('/comment/{id}',[CommentController::class, 'destroy'])->name('comment.destroy');

Route::get("admin", [AdminController::class,"index"])->middleware(["auth"])->name('admin');