<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\WritingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Middleware\CheckLogin;


// USER ROUTES


Route::get('/', [HomeController::class, 'open_home'])->name('index');

Route::get('/featured', [WritingController::class, 'open_featured'])->name('open_featured');

Route::get('/featured/{id}', [WritingController::class, 'detail_featured']);

Route::get('/works', [WorkController::class, 'open_work'])->name('open_work');

Route::get('/works/{id}', [WorkController::class, 'detail_work']);

Route::get('/works/download/{id}', [WorkController::class, 'downloadFile']);

Route::get('/streams', function () {
    return view('/user/streams');
})->name('streams');

Route::get('/writing', function () {
    return view('/user/writing');
})->name('writing');
Route::get('/login', function () {
    return view('/user/login');
})->name('login_page');

Route::post('/login/authentication', [AuthController::class, 'login'])->name('authentication');

// Send Email Routes

Route::post('/email-send', [MailController::class, 'send_email'])->middleware('throttle:sendemail');


Route::middleware(CheckLogin::class)->group(function () {
    // Dashboard Page Routes
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'dashboard_page'])->name('dashboard_page');
    
    Route::get('/dashboard/delete-message/{id}', [DashboardController::class, 'delete_message']);

    // Account Page Routes
   

    Route::get('/manage-account', [AdminController::class, 'manage_account'])->name('manage_account');

    Route::get('/manage-account/add', [AdminController::class, 'add_account'])->name('add_account');

    Route::post('/manage-account/add/submit', [AdminController::class, 'add_account_submit']);

    Route::get('/manage-account/edit/{id}', [AdminController::class, 'edit_account']);

    Route::post('/manage-account/edit/submit/{id}', [AdminController::class, 'edit_account_submit']);

    Route::get('/manage-account/delete/{id}', [AdminController::class, 'delete_account']);


    // Featured Page Routes
    Route::get('/manage-page/featured', [WritingController::class, 'manage_page_featured'])->name('manage_page_featured');

    Route::post('/manage-page/writing/add', [WritingController::class, 'add_writing'])->name('add_featured');

    Route::get('/manage-page/writing/edit/{id}', [WritingController::class, 'edit_writing']);

    Route::post('/manage-page/writing/edit/submit/{id}', [WritingController::class, 'edit_writing_submit']);

    Route::get('/manage-page/writing/delete/{id}', [WritingController::class, 'delete_writing']);

    // Work Page Routes
    Route::get('/manage-page/works', [WorkController::class, 'manage_page_works'])->name('manage_page_works');

    Route::post('/manage-page/work/add', [WorkController::class, 'add_work']);

    Route::get('/manage-page/work/edit/{id}', [WorkController::class, 'edit_work']);

    Route::post('/manage-page/work/edit/submit/{id}', [WorkController::class, 'edit_work_submit']);

    Route::get('/manage-page/work/delete/{id}', [WorkController::class, 'delete_work']);

    // Home Page Routes
    Route::get('/manage-page/home', [HomeController::class, 'manage_page_home'])->name('manage_page_home');

    Route::post('/manage-page/home/add', [HomeController::class, 'add_home']);

    Route::get('/manage-page/home/edit/{id}', [HomeController::class, 'edit_home']);

    Route::post('/manage-page/home/edit/submit/{id}', [HomeController::class, 'edit_home_submit']);

    Route::get('/manage-page/home/delete/{id}', [HomeController::class, 'delete_home']);

    // Temp Image Routes
    Route::post('/temporary/upload', [UploadController::class, 'temporary_upload'])->name('temporary_upload');

});
