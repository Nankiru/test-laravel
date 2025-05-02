<?php

use App\Http\Controllers\LanguageController;
use App\Http\Middleware\userAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Models\User;

Route::get('login', [LoginController::class, 'login']);
Route::post('admin_register', [LoginController::class, 'admin_register']);
Route::post('admin_submit', [LoginController::class, 'admin_submit']);
Route::post('user_login', [LoginController::class, 'user_login']);
Route::post('logout', [LoginController::class, 'logout']);
Route::post('user_logout', [LoginController::class, 'user_logout']);
Route::get('/home', [LoginController::class, 'home']);

Route::middleware([userAuth::class])->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('profile', [UserController::class, 'profileAdmin']);
    Route::get('update_admin/{id}', [LoginController::class, 'update_admin']);
    Route::post('update_admin_submit/{id}', [LoginController::class, 'update_admin_submit']);
    Route::get('users', [UserController::class, 'userList']);
    Route::get('form_product', [UserController::class, 'form_product']);
    Route::get('form', [UserController::class, 'formUser']);
    Route::post('form_submit', [UserController::class, 'formSubmit']);
    Route::get('/delete/{id}', [UserController::class, 'destroy']);

    Route::get('update_user/{id}', [UserController::class, 'update']);
    Route::post('update_submit/{id}', [UserController::class, 'update_submit']);
    Route::post('update_img_admin/{id}', [UserController::class, 'update_img_admin']);
    
    
    Route::get('change', [LanguageController::class, 'changeLanguage'])->name('lang.change');
});
