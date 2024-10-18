<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ReportController;

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

Route::middleware('auth:api')->group(function () {
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{id}/status', [TaskController::class, 'updateStatus']);
    Route::put('/tasks/{id}/reassign', [TaskController::class, 'reassign']);
});


Route::post('/tasks/{id}/dependencies', [TaskController::class, 'addDependency']);

Route::get('/reports/daily-tasks', [TaskController::class, 'generateDailyReport']);

Route::get('/tasks', [TaskController::class, 'index']);

Route::put('/tasks/{id}/restore', [TaskController::class, 'restore']);
Route::post('/tasks/{id}/attachments', [TaskController::class, 'addAttachment']);
Route::delete('/tasks/{id}', [TaskController::class, 'deleteTask']);
Route::post('/tasks/{id}/restore', [TaskController::class, 'restoreTask']);





Route::get('/reports/completed-tasks', [ReportController::class, 'completedTasksReport']);
Route::get('/reports/overdue-tasks', [ReportController::class, 'overdueTasksReport']);
Route::get('/reports/user-tasks/{userId}', [ReportController::class, 'userTasksReport']);



