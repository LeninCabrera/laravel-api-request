<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});