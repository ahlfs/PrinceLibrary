<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\WritingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UploadController;
use App\Http\Middleware\CheckLogin;


// USER ROUTES

Route::get('/', function () {
    return view('/user/index');
})->name('index');

Route::get('/featured', function () {
    return view('/user/featured');
})->name('featured');

Route::get('/works', function () {
    return view('/user/works');
})->name('works');

Route::get('/streams', function () {
    return view('/user/streams');
})->name('streams');

Route::get('/writing', function () {
    return view('/user/writing');

})->name('writing');
Route::get('/login', function () {
    return view('/user/login');
})->name('login');

Route::post('/login/authentication', [AuthController::class, 'login'])->name('authentication');

// ADMIN ROUTES

Route::get('/testing', function () {
    return view('/testing');
})->name('testing');



Route::middleware(CheckLogin::class)->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/account', [AdminController::class, 'account_page'])->name('account_page');

    Route::get('/dashboard', [AdminController::class, 'dashboard_page'])->name('dashboard_page');

    Route::get('/manage-account', [AdminController::class, 'manage_account'])->name('manage_account');

    Route::get('/manage-page/home', [AdminController::class, 'manage_page_home'])->name('manage_page_home');

    Route::get('/manage-page/featured', [AdminController::class, 'manage_page_featured'])->name('manage_page_featured');

    Route::get('/manage-page/works', [AdminController::class, 'manage_page_works'])->name('manage_page_works');

    // Featured Page Routes
    Route::post('/manage-page/featured/add', [WritingController::class, 'add_featured'])->name('add_featured');

    route::post('/manage-page/featured/delete', [WritingController::class, 'delete_featured'])->name('delete_featured');

    // Temp Image Routes
    Route::post('/temporary/upload', [UploadController::class, 'temporary_upload'])->name('temporary_upload');

});