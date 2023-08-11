<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\AudioController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('testing', function(){
//     return 'this is a test api';
// });

Route::post('add-image',[ImagesController::class, 'create']);
Route::put('edit-image', [ImagesController::class, 'edit']);
Route::delete('delete-product', [ImagesController::class, 'delete']);
Route::get('get-data', [ImagesController::class, 'getData']);

Route::get('creators', [CreatorController::class, 'index']);
Route::get('creators/{id}', [CreatorController::class, 'show']);
Route::post('creators', [CreatorController::class, 'store']);
Route::put('creators/{id}', [CreatorController::class, 'update']);
Route::delete('creators/{id}', [CreatorController::class, 'destroy']);

Route::get('audios', [AudioController::class, 'index']);
Route::get('audios/{id}', [AudioController::class, 'show']);
Route::post('audios', [AudioController::class, 'store']);
Route::put('audios/{id}', [AudioController::class, 'update']);
Route::delete('audios/{id}', [AudioController::class, 'destroy']);