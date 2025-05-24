<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialsController;
use Illuminate\Support\Facades\Route;


Route::view('admin', 'backend.pages.dashboard');

Route::prefix('admin/')->group(function(){
    Route::resource('settings', SettingController::class)->only(['index', 'update']);
    Route::resource('abouts', AboutController::class)->only(['index', 'update']);
    Route::resource('testimonials', TestimonialsController::class);
});