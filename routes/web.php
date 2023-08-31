<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TaskController::class, 'index']);

Route::get('/tasks/{task:slug}', [TaskController::class, 'show']);

Route::get('/user/{user:username}', function (User $user) {
    return view('user', [
        'tasks' => $user->task->load(['user'])
    ]);
});

Route::get('/clear-cache', function () {
    Cache::flush();
    return redirect('/');
});

Route::get('/tasks', [TaskController::class, 'create'])->middleware('auth');
Route::post('create', [TaskController::class, 'store'])->middleware('auth');
Route::get('tasks/{task}/edit', [TaskController::class, 'edit']);
Route::patch('tasks/{task}/update', [TaskController::class, 'update']);
Route::delete('tasks/{task}/delete', [TaskController::class, 'destroy']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::post('/tasks/{task:slug}/comments', [CommentController::class, 'store'])->middleware('auth');
Route::get('/tasks/{task:slug}/comment/{comment}' , [CommentController::class, 'edit'])->middleware('auth');
Route::patch('/tasks/{task:slug}/comment/{comment}/edit', [CommentController::class, 'update'])->middleware('auth');
Route::delete('/tasks/{task:slug}/comment/{comment}', [CommentController::class, 'destroy'])->middleware('auth');
