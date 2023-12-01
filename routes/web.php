<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/getTaskList',[TaskController::class,'getTaskList']);
Route::get('/addTask',[TaskController::class,'addTask']);
Route::post('/insertTask',[TaskController::class,'insertTask']);
Route::get('/editTask/{id}',[TaskController::class,'editTask']);
Route::post('/updateTask',[TaskController::class,'updateTask']);
Route::get('/deleteTask/{id}',[TaskController::class,'deleteTask']);
