<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function () {
    return 'Bienvenid@ al examen de recuperación de laravel ;)';
});

Route::post('/create',[OrderController::class,'create']);
Route::get('/calculate/{id}',[OrderController::class,'calculateTotal']);
Route::get('/find/{id}',[OrderController::class,'find']);
Route::patch('/update', [OrderController::class, 'update']);