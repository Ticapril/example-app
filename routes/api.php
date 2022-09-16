<?php

use App\Http\Controllers\UserController;
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

Route::post('/users/create', [UserController::class, "UserCreate"]);

Route::get('/users/show/{id}', [UserController::class, "UserShow"]);

Route::delete('/users/delete/{id}', [UserController::class, "UserDelete"]);

Route::put('/users/update/{id}', [UserController::class, "UserUpdate"]);

Route::get('/users/todos', [UserController::class, "AllUsersShow"]);

Route::get('/users/show-cpf/{cpf}', [UserController::class, "UserShowByCpf"]);
