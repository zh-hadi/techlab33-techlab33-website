<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });




Route::view('/', 'frontend.pages.home')->name('home.page');
Route::view('contact', 'frontend.pages.contact')->name('contact.page');
Route::view('blogs', 'frontend.pages.blog.index')->name('blogs.page');
Route::get('about', [AboutPageController::class, 'index'])->name('about.page');


include('admin.php');