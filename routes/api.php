<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnimalController;

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
//Route::resource('animals',AnimalController::class);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/animals',[AnimalController::class,'index']);
Route::get('/animals/{id}',[AnimalController::class,'show']);

Route::group(['middleware' =>['auth:sanctum']], function () {
    Route::post('/animals',[AnimalController::class,'store']);
    Route::put('/animals/{id}',[AnimalController::class,'update']);
    Route::delete('/animals/{id}',[AnimalController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});
// Route::get('/animals',[AnimalController::class,'index']);
// Route::post('/animal',[AnimalController::class,'store']);
// Route::get('/animals/{id}',[AnimalController::class,'show']);
// // Route::put('/animals/{id}',[AnimalController::class,'update']);
// // Route::delete('/animals/{id}',[AnimalController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

