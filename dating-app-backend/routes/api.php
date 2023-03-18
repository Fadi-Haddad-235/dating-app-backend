<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::group(["middleware" => "auth:api"], function () {
    Route::post('/users', [UserController::class, 'getUsers']);
    Route::post('/editprofile', [UserController::class, 'editProfile']);
});
