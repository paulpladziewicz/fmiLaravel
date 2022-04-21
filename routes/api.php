<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BusinessController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return response()->json(['id' => $request->user()->id, 'name' => $request->user()->name], 200);
});

Route::controller(PersonController::class)->group(function () {
    Route::get('/people', 'index');
    Route::post('/people', 'store');
    Route::get('/people/{id}', 'show');
    Route::put('/people/{id}', 'update');
    Route::delete('/people/{id}', 'destroy');
});

Route::controller(EventController::class)->group(function () {
    Route::get('/events', 'index');
    Route::post('/events', 'store');
    Route::get('/events/{id}', 'show');
    Route::put('/events/{id}', 'update');
    Route::delete('/events/{id}', 'destroy');
});

Route::controller(BusinessController::class)->group(function () {
    Route::get('/businesses', 'index');
    Route::post('/businesses', 'store');
    Route::get('/businesses/{id}', 'show');
    Route::put('/businesses/{id}', 'update');
    Route::delete('/businesses/{id}', 'destroy');
});

Route::get('/', function () {
    return response([
        'message' =>'Hello World',
        'status' => 'success'
    ], 201);
});
