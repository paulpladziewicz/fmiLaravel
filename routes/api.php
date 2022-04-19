<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(PersonController::class)->group(function () {
    Route::get('/people', 'index');
    Route::post('/people', 'store');
    Route::get('/people/{id}', 'show');
    Route::put('/people/{id}', 'update');
    Route::delete('/people/{id}', 'destroy');
});

Route::get('/', function () {
    return response([
        'message' =>'Hello World',
        'status' => 'success'
    ], 201);
});
