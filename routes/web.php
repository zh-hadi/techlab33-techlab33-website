<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\BlogPageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });




Route::view('/', 'frontend.pages.home')->name('home.page');
Route::view('contact', 'frontend.pages.contact')->name('contact.page');
Route::resource('blogs', BlogPageController::class)->except('show');
Route::get('blogs/{slug}', [BlogPageController::class, 'show'])->name('blogs.show');
Route::get('about', [AboutPageController::class, 'index'])->name('about.page');


include('admin.php');