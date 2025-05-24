<?php

use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;


Route::view('admin', 'backend.pages.dashboard');

Route::prefix('admin/')->group(function(){
    Route::resource('settings', SettingController::class)->only(['index', 'update']);
});