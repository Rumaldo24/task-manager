<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('api')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/check-email', [AuthController::class, 'checkEmail']);

    Route::middleware('auth:api')->group(function () {

        Route::get('projects', [ProjectController::class, 'index']);
        Route::post('projects', [ProjectController::class, 'store']);
        Route::get('projects/{id}', [ProjectController::class, 'show']);
        Route::put('projects/{id}', [ProjectController::class, 'update']);
        Route::delete('projects/{id}', [ProjectController::class, 'destroy']);

        Route::get('projects/{project_id}/tasks', [TaskController::class, 'index']);
        Route::post('projects/{project_id}/tasks', [TaskController::class, 'store']);
        Route::get('projects/{project_id}/tasks/{id}', [TaskController::class, 'show']);
        Route::put('projects/{project_id}/tasks/{id}', [TaskController::class, 'update']);
        Route::delete('projects/{project_id}/tasks/{id}', [TaskController::class, 'destroy']);
    });
});