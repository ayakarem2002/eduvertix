<?php

use App\Http\Controllers\Backend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Models\Service;
use App\Http\Controllers\Backend\ServiceController;
use App\Models\Course;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\CustomerOpinionController;
use App\Http\Controllers\Controller;
use App\Models\OurEvent;
use App\Http\Controllers\Backend\OurEventsController;
use App\Models\Homepage;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\HomeController  as FrontendHomeController;



// dashboard
Route::prefix('dashboard')->group(function(){
    
    
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::post('/home/{id}', [HomeController::class, 'update'])->name('home.update');

    Route::get('/categories', [CategoryController::class, 'index'])->name('backend.categories.index');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('backend.categories.show');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('backend.categories.edit');
    Route::post('/categories/create', [CategoryController::class, 'create'])->name('backend.categories.create');
    Route::post('/categories/{id}', [CategoryController::class, 'update'])->name('backend.categories.update');
    Route::post('/categories', [CategoryController::class, 'store'])->name('backend.categories.store');
    Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('backend.categories.destroy');


    Route::get('/about', [AboutUsController::class, 'index'])->name('backend.about.index');
    Route::get('/about/edit/{id}', [AboutUsController::class, 'edit'])->name('backend.about.edit');
    Route::post('/about/{id}', [AboutUsController::class, 'update'])->name('backend.about.update');



    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::delete('/services/delete/{id}', [ServiceController::class, 'delete'])->name('services.destroy');
    Route::post('services/{service}', [ServiceController::class, 'update'])->name('services.update');


    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show'); // For modal/pop-up view
    Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('backend.courses.edit'); // For modal/pop-up edit
    Route::post('/courses/{id}', [CourseController::class, 'update'])->name('courses.update'); // For updating the course
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy'); // For deleting a course
    


    Route::get('/customer-opinions', [CustomerOpinionController::class, 'index'])->name('customer-opinions.index');
    Route::post('/customer-opinions',[CustomerOpinionController::class, 'store'])->name('customer-opinions.store');
    Route::get('/customer-opinions/edit/{id}',[CustomerOpinionController::class, 'edit'])->name('customer-opinions.edit');
    Route::get('/customer-opinions/{id}', [CustomerOpinionController::class, 'show'])->name('customer-opinions.show');
    Route::post('/customer-opinions/create', [CustomerOpinionController::class, 'create'])->name('customer-opinions.create');
    Route::post('/customer-opinions/{id}', [CustomerOpinionController::class, 'update'])->name('customer-opinions.update');
    Route::delete('/customer-opinions/delete/{id}', [CustomerOpinionController::class, 'destroy'])->name('customer-opinions.destroy');


    Route::get('/our-events', [OurEventsController::class, 'index'])->name('our-events.index');
    Route::get('/our-events/create', [OurEventsController::class, 'create'])->name('our-events.create');
    Route::get('/our-events/edit/{id}', [OurEventsController::class, 'edit'])->name('our-events.edit');
    Route::get('/our-events/{id}', [OurEventsController::class, 'show'])->name('our-events.show');
    Route::delete('/our-events/delete/{id}', [OurEventsController::class, 'destroy'])->name('our-events.destroy');
    Route::post('/our-events', [OurEventsController::class, 'store'])->name('our-events.store');
    Route::post('/our-events/{id}', [OurEventsController::class, 'update'])->name('our-events.update');



    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::get('/applications/edit/{id}', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::delete('/applications/delete/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::post('/applications/{id}', [ApplicationController::class, 'update'])->name('applications.update'); 

    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::post('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');


    Route::get('/contacts', [ContactController::class, 'index'])->name('backend.contacts.index');
    Route::post('/contacts', [ContactController::class, 'store'])->name('backend.contacts.store');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('backend.contacts.destroy');


    Route::get('/settings', [SettingController::class, 'index'])->name('backend.settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('backend.settings.store');
    Route::post('/settings/{id}', [SettingController::class, 'update'])->name('backend.settings.update');
    Route::delete('/settings/{id}', [SettingController::class, 'destroy'])->name('backend.settings.destroy');

});


// frontend

Route::prefix('frontend')->group(function(){

    
Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


});
