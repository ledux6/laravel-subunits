<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\SubUnitController;
use App\Http\Controllers\TruckController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);

Route::get('/truck/{id}', [TruckController::class, 'get']);
Route::post('/truck/update/{id}', [TruckController::class, 'update']);
Route::get('/truck/delete/{id}', [TruckController::class,'delete']);
Route::get('/truck', function() { return view('truck-create');}); 
Route::post('/truck', [TruckController::class,'create']);

Route::get('/sub-unit', [SubUnitController::class,'createOptions']);
Route::post('/sub-unit', [SubUnitController::class,'create']);
Route::get('/sub-unit/delete/{id}', [SubUnitController::class,'delete']);
Route::get('/sub-unit/{id}', [SubUnitController::class,'get']);
Route::post('/sub-unit/{id}', [SubUnitController::class,'update']);