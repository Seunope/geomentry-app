<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\CircleController;
use App\Http\Controllers\Api\v1\TriangleController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::group(['prefix'=> 'v1'], function () {
    Route::get('/circle/{radius}', [CircleController::class, 'index']);
    Route::get('/triangle/{height}/{base}/{side}', [TriangleController::class, 'index']);
});


