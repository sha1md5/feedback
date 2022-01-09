<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SessionsController;

Route::get('/login', [SessionsController::class, 'form'])->middleware('guest')->name('login');
Route::post('/login', [SessionsController::class, 'login'])->middleware('guest');

Route::get('/logout', [SessionsController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('report')->middleware('auth')->group(function () {
    Route::get('/dashboard', [ReportController::class, 'dashboard'])->name('dashboard');
    Route::get('/range', [ReportController::class, 'range'])->name('range');
    Route::get('/text', [ReportController::class, 'text'])->name('text');
});

Route::get('/{project}', [ProjectController::class, 'createEmployeeAndRedirect']);
Route::get('/{project}/{employee}', [EmployeeController::class, 'getQuestionsAndAnswers']);
Route::post('/{project}/{employee}', [EmployeeController::class, 'storeAnswers']);
Route::get('/{project}/{employee}/thankyou', [EmployeeController::class, 'thankyou']);
