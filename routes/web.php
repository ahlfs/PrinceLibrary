<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/featured', function () {
    return view('featured');
});

Route::get('/works', function () {
    return view('works');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/streams', function () {
    return view('streams');

});

Route::get('/writing', function () {
    return view('writing');

});
Route::get('/login', function () {
    return view('login');
});
