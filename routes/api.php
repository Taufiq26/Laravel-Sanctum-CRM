<?php

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


//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);

    // Online Retail Transaction
    Route::get('/or_transaction', [App\Http\Controllers\API\OnlineRetailTransactionController::class, 'getAllTransaction']);
    Route::get('/or_transaction/{inv_code}', [App\Http\Controllers\API\OnlineRetailTransactionController::class, 'show']);
    Route::post('/or_transaction', [App\Http\Controllers\API\OnlineRetailTransactionController::class, 'store']);
    Route::put('/or_transaction', [App\Http\Controllers\API\OnlineRetailTransactionController::class, 'update']);
    Route::delete('/or_transaction/{inv_code}', [App\Http\Controllers\API\OnlineRetailTransactionController::class, 'destroy']);

    // Program (Kebutuhan UTS)
    Route::get('/program', [App\Http\Controllers\API\ProgramsController::class, 'getAll']);
    Route::post('/program', [App\Http\Controllers\API\ProgramsController::class, 'store']);
    Route::put('/program/{id}', [App\Http\Controllers\API\ProgramsController::class, 'update']);
    Route::delete('/program/{id}', [App\Http\Controllers\API\ProgramsController::class, 'destroy']);
});