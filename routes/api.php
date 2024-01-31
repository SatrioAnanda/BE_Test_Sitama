<?php

use App\Http\Controllers\DynamicRenderController;
use App\Http\Controllers\FrontServiceController;
use App\Http\Controllers\OrdersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Order API
Route::get('/order', [OrdersController::class, 'get']);
Route::post('/order/create', [OrdersController::class, 'create']);
Route::delete('/order/delete/{id}', [OrdersController::class, 'create'])->where('id', '[0-9]+');

// Dynamic Render API
Route::get('/dynamic-render/{id}', [DynamicRenderController::class, 'getByOrder'])->where('id', '[0-9]+');
