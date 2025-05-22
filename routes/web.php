<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::view('admin', 'backend.pages.dashboard');
Route::view('/', 'frontend.pages.home');
