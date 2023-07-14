<?php

use App\Http\Controllers\Admin\KonselingController;
use App\Http\Controllers\ChatBot\ChatController;
use App\Http\Controllers\FCMController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('pasien')->group(function () {
//     Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
//         Route::post('/save-token', [FCMController::class, 'index']);
//     });
// });

Route::middleware(['auth:sanctum', 'verified'])->post('/save-token', [FCMController::class, 'index']);
Route::middleware('auth:admin')->post('/save-token-admin', [FCMController::class, 'admin']);
// Route::post('/save-token', [FCMController::class, 'index']);
Route::get('/konseling', [KonselingController::class, 'index']);

