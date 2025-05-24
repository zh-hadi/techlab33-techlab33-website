<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::view('/', 'frontend.pages.home');


include('admin.php');