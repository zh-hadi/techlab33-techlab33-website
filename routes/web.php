<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\BlogPageController;
use App\Http\Controllers\ProjectPageController;
use App\Http\Controllers\ServicesPageController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\ContactPageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/', [HomePageController::class, 'index'])->name('home.page');
Route::get('contact', [ContactPageController::class, 'index'])->name('contact.page');
Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::resource('blogs', BlogPageController::class)->only('index');
Route::get('blogs/{slug}', [BlogPageController::class, 'show'])->name('blogs.show');
Route::get('about', [AboutPageController::class, 'index'])->name('about.page');
Route::resource('projects', ProjectPageController::class)->only('index')->names('projectspage');
Route::get('projects/{slug}', [ProjectPageController::class, 'show'])->name('projectspage.show');

Route::resource('services', ServicesPageController::class)->only('index')->names('servicespage');
Route::get('services/{slug}', [ServicesPageController::class, 'show'])->name('servicespage.show');

Route::post('subscribes', [SubscribeController::class, 'store'])->name('subscribe.store');

include('admin.php');