<?php

use App\Http\Controllers\userController;
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

Route::get('hi',function (){
    return 'hi';
});

// register new user
Route::post('register',userController::class . '@register');

// get all users
Route::get('register',userController::class . '@getAllUsers');

// login an exite user
Route::post('/login',userController::class . '@login');







