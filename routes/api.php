<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipmentTypeController;
use App\Http\Middleware\PrepareRequestHeaderMiddleWare;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware([PrepareRequestHeaderMiddleWare::class])->group(function () {
    Route::get('/equipment', [EquipmentController::class, 'index'])->name('list');
    Route::get('/equipment/{id}', [EquipmentController::class, 'show'])->name('view');
    Route::post('/equipment', [EquipmentController::class, 'store'])->name('store');
    Route::delete('/equipment/{id}', [EquipmentController::class, 'destroy'])->name('delete');
    Route::put('/equipment/{id}', [EquipmentController::class, 'update'])->name('update');

    Route::get('/equipment-type', [EquipmentTypeController::class, 'index'])->name('types-list');
});
