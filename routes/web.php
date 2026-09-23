<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [TaskController::class, 'dashboard'])
    ->name('dashboard');

Route::resource('tasks', TaskController::class);