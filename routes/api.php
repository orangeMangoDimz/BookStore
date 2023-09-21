<?php

use App\http\Controllers\Api\PublisherController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('publisher/', [PublisherController::class, 'index']);
Route::post('publisher/', [PublisherController::class, 'create']);
Route::get('publisher/{id}', [PublisherController::class, 'show']);
Route::patch('publisher/{id}/update', [PublisherController::class, 'update']);