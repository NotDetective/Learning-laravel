<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

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

Route::get('/', function () {
    return view('tasks', [
        'tasks' => Cache::rememberForever('tasks', function() {
            return Task::with('user')->get();
        })
    ]);
});

Route::get('/tasks/{task:slug}', function (Task $task) {
    return view('task', [
        'task' => $task
    ]);
});

Route::get('/user/{user:username}', function (User $user) {
    return view('user', [
       'tasks' => $user->task->load(['user'])
    ]);
});

Route::get('/clear-cache', function () {
    Cache::flush();
    Return redirect('/');
});
