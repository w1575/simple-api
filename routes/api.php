<?php

use App\Http\Controllers\EquipmentController;
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

Route::get('/api/equipment', [EquipmentController::class, 'index'])->name('list');
Route::get('/api/equipment/{id}', [EquipmentController::class, 'show'])->name('view');
Route::post('/api/equipment', [EquipmentController::class, 'store'])->name('store');
Route::delete('/api/equipment/{id}', [EquipmentController::class, 'index'])->name('delete');
