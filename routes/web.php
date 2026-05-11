<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('pages.index');
});

Route::get('/admin', function () {
    return view('pages.admin.dashboard.index');
});