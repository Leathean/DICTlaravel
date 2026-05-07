<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.dashboard');
});


Route::get('/dashboard', function () {
    return view('Pages.dashboard');
})->name('dashboard');

Route::resource('movies', MovieController::class);
Route::resource('books', BookController::class);

Route::get('/page1', function () {
    return view('Pages.page1');
})->name('p1');

Route::get('/page2', function () {
    return view('Pages.page2');
})->name('p2');

Route::get('/page3', function () {
    return view('Pages.page3');
})->name('p3');
Route::get('/page4', function () {
    return view('Pages.page4-helper');
})->name('p4');

Route::get('/movie-form', function () {
    return view('Pages.movie-form');
})->name('mf');
