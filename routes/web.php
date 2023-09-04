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
Route::get('/clear-cache', function () {
    Cache::flush();
    return redirect('/');
});

Route::get('/', [TaskController::class, 'index']);
Route::get('/tasks/{task:slug}', [TaskController::class, 'show'])
    ->name('tasks.show');
Route::get('/tasks', [TaskController::class, 'create'])->middleware('auth');
Route::get('/create', [TaskController::class, 'create'])->middleware('auth');
Route::post('/create', [TaskController::class, 'store'])->middleware('auth');
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])
    ->name('tasks.edit');
Route::patch('tasks/{task}/update', [TaskController::class, 'update'])
    ->name('tasks.update');
Route::delete('tasks/{task}/delete', [TaskController::class, 'destroy'])
    ->name('tasks.destroy');

Route::get('/user/{user:username}', function (User $user) {
    return view('user', [
        'tasks' => $user->task->load(['user'])
    ]);
})->name('user');
Route::get('register', [RegisterController::class, 'create'])->middleware('guest')
    ->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')
    ->name('register.store');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')
    ->name('sessions.create');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest')
    ->name('sessions.store');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::post('/tasks/{task:slug}/comments', [CommentController::class, 'store'])->middleware('auth')
    ->name('tasks.comments.store');


Route::get('/tasks/{task:slug}/comment/{comment}', [CommentController::class, 'edit'])->middleware('auth')
    ->name('comment.edit');
Route::patch('/tasks/{task:slug}/comment/{comment}/edit', [CommentController::class, 'update'])->middleware('auth')
    ->name('comment.update');
Route::delete('/tasks/{task:slug}/comment/{comment}', [CommentController::class, 'destroy'])->middleware('auth')
    ->name('comment.destroy');
