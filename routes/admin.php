<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\BusinessPartnerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\NewslaterMessageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TestimonialsController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

use App\Mail\NewsLaterMail;


Route::view('admin', 'backend.pages.dashboard');

Route::prefix('admin/')->group(function(){

    Route::resource('login', LoginController::class)->only(['index', 'store']);
    Route::get('logout', LogoutController::class)->name('logout');

    Route::middleware(['auth'])->group(function(){
        Route::resource('settings', SettingController::class)->only(['index', 'update']);
        Route::resource('aboutpage/abouts', AboutController::class)->only(['index', 'update']);
        Route::resource('aboutpage/testimonials', TestimonialsController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('aboutpage/business-partners', BusinessPartnerController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('aboutpage/skills', SkillController::class)->only(['index', 'store', 'update', 'destroy']);


        Route::resource('blog/tags', TagController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('blog/categories', CategoryController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('blog/posts', PostController::class);

        Route::resource('contacts', ContactController::class)->except(['store']);
        
        Route::resource('project-category', ProjectCategoryController::class);
        Route::resource('projects', ProjectController::class);
        Route::delete('/projects/image/{image}', [ProjectController::class, 'deleteImage'])->name('projects.image.delete');

        Route::resource('services', ServiceController::class);

        Route::resource('features', FeatureController::class);

        Route::resource('subscribes', SubscribeController::class)->except(['store']);
        Route::resource('send/newslaters', NewslaterMessageController::class)->only(['index', 'store']);
    });

    Route::get('/test-mail', function(){
        // Mail::raw('This is a test email from laravel', function($message){
        //     $message->to('zhhadi50@gmail.com')
        //         ->subject('Test Mail');
        //     $message->bcc('test@techlab33.com');
        // });
         $data = [
            'name' => 'Hadiuzzaman',
            'message' => 'Thanks for subscribing to our newsletter!'
        ];

        Mail::to('zhhadi50@gmail.com')->send(new NewsLaterMail($data));

        return 'Mail Send!';
    });

});