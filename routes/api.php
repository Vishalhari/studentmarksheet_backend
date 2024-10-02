<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StudentmarksController;

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

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [UserController::class, 'Registeruser']);
Route::post('/login', [UserController::class, 'Authenticate']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/subjects', [StudentmarksController::class, 'get_subjects']);
    Route::resource('studentmarks', StudentmarksController::class);
    Route::post('/logout', [UserController::class, 'logout']);
});
