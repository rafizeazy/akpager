<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController\HomeController;
use App\Http\Controllers\FrontendController\PageController;
use App\Http\Controllers\FrontendController\DashboardController;
use App\Http\Controllers\Auth\LoginController;

/**
 *    Frontend
 */

// All Index Pages Routing
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'indexOne')->name('home'); // index
    Route::get('index2', 'indexTwo')->name('indexTwo');
    Route::get('index3', 'indexThree')->name('indexThree');
    Route::get('index4', 'indexFour')->name('indexFour');
    Route::get('index5', 'indexFive')->name('indexFive');
    Route::get('index6', 'indexSix')->name('indexSix');
    Route::get('index7', 'indexSeven')->name('indexSeven');
    Route::get('index8', 'indexEight')->name('indexEight');
    Route::get('index9', 'indexNine')->name('indexNine');
    Route::get('index10', 'indexTen')->name('indexTen');

    Route::get('index1-onepage', 'indexOneOnepage')->name('indexOneOnepage');
    Route::get('index2-onepage', 'indexTwoOnepage')->name('indexTwoOnepage');
    Route::get('index3-onepage', 'indexThreeOnepage')->name('indexThreeOnepage');
    Route::get('index4-onepage', 'indexFourOnepage')->name('indexFourOnepage');
    Route::get('index5-onepage', 'indexFiveOnepage')->name('indexFiveOnepage');
    Route::get('index6-onepage', 'indexSixOnepage')->name('indexSixOnepage');
    Route::get('index7-onepage', 'indexSevenOnepage')->name('indexSevenOnepage');
    Route::get('index8-onepage', 'indexEightOnepage')->name('indexEightOnepage');
    Route::get('index9-onepage', 'indexNineOnepage')->name('indexNineOnepage');
    Route::get('index10-onepage', 'indexTenOnepage')->name('indexTenOnepage');
});

// Other Pages Routing
Route::controller(PageController::class)->group(function () {
    Route::get('about', 'about')->name('about');
    Route::get('faqs', 'faqs')->name('faqs');
    Route::get('team', 'team')->name('team');
    Route::get('pricing', 'pricing')->name('pricing');
    Route::get('contact', 'contact')->name('contact');
    Route::get('sign-in', 'signIn')->name('signIn');
    Route::get('sign-up', 'signUp')->name('signUp');
    Route::get('coming-soon', 'comingSoon')->name('comingSoon');
    Route::get('404', 'errorPage')->name('errorPage');
    Route::get('services', 'services')->name('services');
    Route::get('service-details', 'serviceDetails')->name('serviceDetails');
    Route::get('shop', 'shop')->name('shop');
    Route::get('product-details', 'productDetails')->name('productDetails');
    Route::get('cart', 'cart')->name('cart');
    Route::get('checkout', 'checkout')->name('checkout');
    Route::get('projects', 'projects')->name('projects');
    Route::get('project-list', 'projectList')->name('projectList');
    Route::get('project-masonry', 'projectMasonry')->name('projectMasonry');
    Route::get('project-details', 'projectDetails')->name('projectDetails');
    Route::get('blog', 'blog')->name('blog');
    Route::get('blog/{post}', 'blogDetails')->name('blogDetails');
});

// Dashboard Routes
Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');
    Route::get('dashboard/export', 'export')->name('dashboard.export');
});

// Auth Routes
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Reset Password Route (handled by Filament)

