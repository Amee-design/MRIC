<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/onhold', 'onHold');
});

Route::group(['middleware' => 'guest'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::get('/forgot-password', 'forgotPassword')->name('forgotPassword');
        Route::get('/verify-account/{email}/{password}', 'verifyAccount');
        Route::post('/register', 'handleRegistration');
        Route::post('/login', 'handleLogin');
        Route::post('/forgot-password', 'forgotPassword');
        Route::post('/secure-otp', 'validateOtp');
        Route::post('/verify-account/{email}/{password}', 'handleVerification');

        Route::post('/new-password', 'newPassword')->name('newPassword');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin', 'admin')->name('admin.home');
    });
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/members/{type}', 'members')->name('admin.users');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::post('/admin/addCategory', 'addCategory')->name('admin.addCategory');
        Route::get('/admin/categories', 'categories')->name('admin.categories');
        Route::get('/admin/delete-category/{id}', 'destroy')->name('admin.deleteCategory');
        Route::get('/admin/get-category/{id}', 'getCategory');
        Route::post('/admin/update-category', 'update')->name('admin.updateCategory');
    });
    Route::controller(PostController::class)->group(function () {
        Route::get('/admin/posts', 'index')->name('admin.posts');
        Route::get('/admin/editPost/{post_id}', 'edit')->name('admin.editPost');
        Route::post('/admin/savePost', 'store')->name('admin.savePost');
    });
    Route::controller(SettingController::class)->group(function () {
        Route::get('/admin/settings', 'index')->name('admin.settings');
        Route::post('/admin/save-settings', 'store')->name('admin.saveSettings');
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
