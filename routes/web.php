<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/browse', function () {
    return view('browse');
});

Route::get('/details', function () {
    return view('details');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/streams', function () {
    return view('streams');
});
