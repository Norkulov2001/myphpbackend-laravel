<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\PhonesController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\AuhtController;
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

Route::post('login', [AuhtController::class, 'login']);

Route::group([
    'middleware' => 'auth:api'
], function()
{
    Route::get('/phones', [PhonesController::class, 'index']);
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/books', [BookController::class, 'index']);
});
