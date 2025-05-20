<?php

use App\Http\Controllers\CommentController;
use App\Http\Middleware\userAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LanguageController;

Route::get('login', [LoginController::class, 'login']);
Route::post('admin_register', [LoginController::class, 'admin_register']);

Route::post('admin_submit', [LoginController::class, 'admin_submit']);

Route::post('logout', [LoginController::class, 'logout']);
Route::get('/home', [LoginController::class, 'home']);
Route::post('/forgot_password', [LoginController::class, 'forgot_password']);




// User Controller
Route::get('/register', [UserController::class, 'Register']);
Route::post('/register_submit', [UserController::class, 'register_submit']);
Route::get('/signin', [UserController::class, 'SignIN']);
Route::post('signin_submit', [UserController::class, 'signin_submit']);
Route::get('user_logout', [UserController::class, 'user_logout']);




Route::get('/', [ProductController::class, 'index']);

Route::middleware('admin.only')->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->middleware('admin.only');
    Route::get('profile', [UserController::class, 'profileAdmin']);
    Route::get('update_admin/{id}', [LoginController::class, 'update_admin']);
    Route::post('update_admin_submit/{id}', [LoginController::class, 'update_admin_submit']);
    Route::get('users', [UserController::class, 'userList'])->middleware('admin.only');


    Route::get('form_product', [UserController::class, 'form_product'])->middleware('admin.only');
    Route::get('form', [UserController::class, 'formUser'])->middleware('admin.only');
    Route::post('form_submit', [UserController::class, 'formSubmit'])->middleware('admin.only');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->middleware('admin.only');

    Route::get('update_user/{id}', [UserController::class, 'update'])->middleware('admin.only');
    Route::post('update_submit/{id}', [UserController::class, 'update_submit'])->middleware('admin.only');
    Route::post('update_img_admin/{id}', [UserController::class, 'update_img_admin'])->middleware('admin.only');



    // Delete Product
    Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->middleware('admin.only');

    // Message Route
    // Auth::routes()->middleware('admin.only');






    // Route Search User
    Route::get('search', [UserController::class, 'search'])->middleware('admin.only');
    Route::get('search_index', [UserController::class, 'search_index'])->middleware('admin.only');

    Route::get('change', [LanguageController::class, 'changeLanguage'])->name('lang.change')->middleware('admin.only');
    // Route::get('changelang/{changelang}', [LangController::class, 'changeLanguage'])->name('lang.changelang');

});

// Middleware for users
Route::post('/remove-from-cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Route::post('add_to_cart/{id}', [CartController::class, 'addToCart']);
// Route::post('/add_to_cart/{id}', [CartController::class, 'addToCart'])->middleware('auth');
Route::post('/add_to_cart/{id}', [CartController::class, 'addToCart'])->middleware('auth');

// Route::post('/remove_from_cart/{id}', [CartController::class, 'removeFromCart']);
Route::delete('/remove_from_cart/{id}', [CartController::class, 'removeFromCart']);

// web.php
Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');


Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');

// ⁡⁢⁣⁢Products Route⁡

Route::post('/add_brand', [ProductController::class, 'AddbrandCategory']);
Route::get('/cart-view', [ProductController::class, 'CartView']);
Route::get('/form_product', [ProductController::class, 'FormProduct']);
Route::get('product', [ProductController::class, 'ProductList'])->middleware('admin.only');
Route::get('seacrh_product', [ProductController::class, 'search']);
Route::post('/add-product', [ProductController::class, 'addProduct']);
Route::post('/update-product/{id}', [ProductController::class, 'UpdateProduct']);
Route::get('product-detail/{id}', [ProductController::class, 'ProductDetail']);
// Route::get('/index', [ProductController::class, 'index']);
Route::get('/all-product/{category}/{brand}', [ProductController::class, 'filterByCategoryBrand']);
Route::get('/all-product/{category}', [ProductController::class, 'filterByCategory']);
Route::get('/ContactUs', action: [MessageController::class, 'ContactUs']);
// Route::post('/contact_submit', action: [MessageController::class, 'contact_submit']);
Route::post('/contact_submit', action: [MessageController::class, 'contact_submit']);
Route::get('changelang', [LangController::class, 'changeLanguage'])->name('lang.changelang');

// Comment
Route::post('/comments', [CommentController::class, 'store']);

// Route::middleware(['user.auth'])->group(function () {
//     Route::get('/cart', [CartController::class, 'index']);
//     Route::post('/add_to_cart/{id}', [CartController::class, 'addToCart']);
// });
