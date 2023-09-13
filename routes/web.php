<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AccountController;
use App\Models\User;
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

//tasks
Route::get('/', [TaskController::class, 'index']);
Route::get('/tasks/{task:slug}', [TaskController::class, 'show'])
    ->name('tasks.show');
Route::get('/create', [TaskController::class, 'create'])->middleware('has.permissions:task_add');
Route::post('/create', [TaskController::class, 'store'])->middleware('has.permissions:task_add')
    ->name('tasks.store');
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->middleware('has.permissions:task_edit')
    ->name('tasks.edit');
Route::patch('tasks/{task}/update', [TaskController::class, 'update'])->middleware('has.permissions:task_edit')
    ->name('tasks.update');
Route::delete('tasks/{task}/delete', [TaskController::class, 'destroy'])->middleware('has.permissions:task_delete')
    ->name('tasks.destroy');

//users
Route::get('/user/{user:username}', function (User $user) {
    return view('user', [
        'tasks' => $user->task->load(['user'])
    ]);
})->name('user');
Route::get('register', [RegisterController::class, 'create'])->middleware('guest')
    ->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')
    ->name('register.store');

//sessions
Route::get('login', [SessionsController::class, 'create'])->middleware('guest')
    ->name('sessions.create');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest')
    ->name('sessions.store');
Route::get('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//comments
Route::post('/tasks/{task:slug}/comments', [CommentController::class, 'store'])->middleware('auth')
    ->name('tasks.comments.store');
Route::get('/tasks/{task:slug}/comment/{comment}', [CommentController::class, 'edit'])->middleware('auth')
    ->name('comment.edit');
Route::patch('/tasks/{task:slug}/comment/{comment}/edit', [CommentController::class, 'update'])->middleware('auth')
    ->name('comment.update');
Route::delete('/tasks/{task:slug}/comment/{comment}', [CommentController::class, 'destroy'])->middleware('auth')
    ->name('comment.destroy');

//roles
Route::get('roles', [RoleController::class, 'create'])->middleware('has.permissions:role_add')
    ->name('role.create');
Route::post('roles', [RoleController::class, 'store'])->middleware('has.permissions:role_add')
    ->name('role.store');
Route::get('show', [RoleController::class, 'show'])->middleware('has.permissions:role_show')
    ->name('role.show');
Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->middleware('has.permissions:role_edit')
    ->name('role.edit');
Route::patch('roles/{role}/update', [RoleController::class, 'update'])->middleware('has.permissions:role_edit')
    ->name('role.update');
Route::delete('roles/{role}/delete', [RoleController::class, 'destroy'])->middleware('has.permissions:role_delete')
    ->name('role.destroy');

//permissions
Route::get('permissions', [PermissionController::class, 'create'])->middleware('has.permissions:permission_add')
    ->name('permission.create');
Route::post('permissions', [PermissionController::class, 'store'])->middleware('has.permissions:permission_add')
    ->name('permission.store');

//account
Route::get('account/{user}/edit', [AccountController::class, 'edit'])->middleware('auth')
    ->name('account.edit');
Route::patch('account/{user}/updatePassword', [AccountController::class, 'updatePassword'])->middleware('auth')
    ->name('account.updatePassword');
Route::patch('account/{user}/updateEmail', [AccountController::class, 'updateEmail'])->middleware('auth')
    ->name('account.updateEmail');
Route::patch('account/{user}/updateUsername', [AccountController::class, 'updateUsername'])->middleware('auth')
    ->name('account.updateUsername');
Route::delete('account/{user}/delete', [AccountController::class, 'destroy'])->middleware('auth')
    ->name('account.destroy');
Route::patch('account/{user}/updateProfile', [AccountController::class, 'updateProfile'])->middleware('auth')
    ->name('account.updateProfile');

//account admin
Route::get('account-admin', [AccountController::class, 'show'])->middleware('has.permissions:account_show')
    ->name('account.show');
Route::patch('account-admin/{user}/update', [AccountController::class, 'addRole'])->middleware('has.permissions:account_edit')
    ->name('account.update');
Route::get('account/{user}/edit-admin', [AccountController::class, 'editAdmin'])->middleware('has.permissions:account_edit')
    ->name('account.edit-admin');
Route::patch('account/{user}/update-admin', [AccountController::class, 'updateAdmin'])->middleware('has.permissions:account_edit')
    ->name('account.update-admin');

//new user by admin
Route::get('create-account-by-admin', [RegisterController::class, 'createAdmin'])->middleware('auth')
    ->name('register.create-admin');
Route::post('store-account-by-admin', [RegisterController::class, 'storeAdmin'])->middleware('auth')
    ->name('register.store-admin');
Route::get('edit-password-new-user', [SessionsController::class, 'editNewUserPassword'])->middleware('auth')
    ->name('sessions.edit-new-user');
Route::post('store-password-net-user', [SessionsController::class, 'storeNewUserPassword'])->middleware('auth')
    ->name('sessions.store-new-user');

Route::get('send-mail', function () {
});


//playground
Route::get('playground', function () {
    return view('playground');
});
