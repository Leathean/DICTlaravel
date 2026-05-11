<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\CountryApiController;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/movies', function () {
    return Movie::select('id', 'title')->get();
});

Route::apiResource('/categories', CategoryApiController::class);
Route::apiResource('/countries', CountryApiController::class);
