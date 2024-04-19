<?php

use App\Http\Controllers\Api\userController;
use App\Http\Controllers\CardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register',[userController::class,'register']);
Route::post('login',[userController::class,'login']);
Route::post('logout',[userController::class,'logout'])
  ->middleware('auth:sanctum');

  Route::get('/', function(){
    return "hello";
  });
  Route::get('test', [CardController::class, 'index']);
  Route::middleware(['auth:sanctum'])->group(function(){
      Route::post('store', [CardController::class, 'store']);
    Route::delete('delete/{card}', [CardController::class, 'destroy']);
    Route::match(['post', 'put'], 'update/{card}', [CardController::class, 'update']);
    Route::get('find/{card}', [CardController::class, 'find']);
});

