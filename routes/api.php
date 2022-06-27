<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SpicialiterController;
use App\Http\Controllers\LocalisationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;



// Route::post('register', [UserController::class, 'insert']);
// Route::post('login', [UserController::class, 'login']);
// Route::post('contact', [ContactController::class, 'store']);
// Route::get('localisation', [LocalisationController::class, 'index']);
// Route::get('Spicialiter', [SpicialiterController::class, 'index']);
// Route::post('admin', [AdminController::class, 'login']);
// Route::get('show/{id}', [UserController::class, 'show']);

// Route::post('cont', [AdminController::class, 'register']);


// Route::middleware('auth:api')->group(function () {
//     Route::get('user', [UserController::class, 'userInfo']);
//     Route::put('users/{id}', [UserController::class, 'update']);
// });

// Route::apiResource('user',UserController::class);
Route::apiResource('spisialiter',SpicialiterController::class);
Route::apiResource('admin',AdminController::class);
Route::apiResource('ville',LocalisationController::class);
Route::apiResource('contact',ContactController::class);
Route::post('register', [UserController::class ,'register']);
Route::post('update', [UserController::class ,'update']);
Route::get('user/{id}', [UserController::class ,'show']);


    Route::post('login', [AuthController::class ,'login']);
    Route::post('logout', [AuthController::class ,'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);




// Route::middleware('auth:api')->group(function () {
//     Route::delete('users/{id}', [UserController::class, 'destroy']);
//     Route::post('localisation', [LocalisationController::class, 'store']);
//     Route::post('spisialiter', [SpicialiterController::class, 'store']);
// });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
