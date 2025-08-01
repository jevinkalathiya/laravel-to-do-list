<?php

use App\Http\Controllers\taskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(taskController::class)->group(function () {
    Route::get('/', 'showTasks')->name('index');
    Route::post('/add','addTask')->name('addTask');
    Route::get('/edit/{id}','getTask')->name('getTaskDetails');
    Route::put('/update/{id}','updateTask')->name('updatesTask');
    Route::get('/status/{action}/{id}','updateStatus')->name('update.status');
});
