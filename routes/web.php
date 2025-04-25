<?php

use App\Http\Controllers\LanguageController;
use App\Http\Middleware\userAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Models\User;

Route::get('login', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'register']);
Route::post('register_submit', [LoginController::class, 'register_submit']);
Route::post('login_submit', [LoginController::class, 'login_submit']);
Route::post('logout', [LoginController::class, 'logout']);

Route::middleware([userAuth::class])->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('profile', [UserController::class, 'profileAdmin']);
    Route::get('update_admin/{id}', [LoginController::class, 'update_admin']);
    Route::post('update_admin_submit/{id}', [LoginController::class, 'update_admin_submit']);
    Route::get('users', [UserController::class, 'userList']);
    Route::get('form', [UserController::class, 'formUser']);
    Route::post('form_submit', [UserController::class, 'formSubmit']);
    Route::get('/delete/{id}', [UserController::class, 'destroy']);

    Route::get('change', [LanguageController::class, 'changeLanguage'])->name('lang.change');
    Route::get('update_user/{id}', [UserController::class, 'update']);
    Route::post('update_submit/{id}', [UserController::class, 'update_submit']);

    Route::post('update_img_admin/{id}', [UserController::class, 'update_img_admin']);


});
