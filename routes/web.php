<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', function () {
    return view('frontend.table-mahasiswa');
});

Route::get('/orangtua', function () {
    return view('frontend.table-orangtua');
});

Route::get('/panitia', function () {
    return view('frontend.table-panitia');
});
