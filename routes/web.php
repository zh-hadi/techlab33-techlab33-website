<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::view('/', 'frontend.pages.home')->name('home.page');
Route::view('contact', 'frontend.pages.contact')->name('contact.page');


include('admin.php');