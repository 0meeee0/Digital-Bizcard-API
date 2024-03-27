<?php

use App\Http\Controllers\Api\userController;
use App\Http\Controllers\CardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('register', [userController::class, 'register']);


Route::get('test', [CardController::class, 'index']);
Route::post('store', [CardController::class, 'store']);
Route::delete('delete/{card}', [CardController::class, 'destroy']);
Route::put('update/{card}', [CardController::class, 'update']);
Route::get('find/{card}', [CardController::class, 'find']);