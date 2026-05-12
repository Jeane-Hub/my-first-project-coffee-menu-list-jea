<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\MenuController;

// Home Page
Route::get('/home', function () { return view('home'); })->name('home');

// About Page
Route::get('/about', function () { return view('about'); })->name('about');

// Contact Page
Route::get('/contact', function () { return view('contact'); })->name('contact');

// Login Page
Route::get('/login', function () { return view('login'); })->name('login');

// Submit Login
Route::post('/login', [AuthController::class, 'login']); 

// Registration Page
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Submit Register
Route::post('/register', [AuthController::class, 'register']); 

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Submit Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Charts
Route::get('/admin/dashboard', [AuthController::class, 'getDashboard'])->name('admin.dashboard');

// Manage Users
Route::get('/admin/manage_user', [AuthController::class, 'showManage'])->name('admin.manage.user');

// Delete Users
Route::post('/admin/manage/delete/{id}', [AuthController::class, 'destroy'])->name('users.destroy');

// Store Users
Route::post('/admin/manage/store', [AuthController::class, 'store'])->name('users.store');

// Update Users
Route::post('/admin/manage/update/{id}', [AuthController::class, 'update'])->name('users.update');

// Admin Profile Page
Route::get('/admin/profile', [AuthController::class, 'profile'])->name('admin.profile');

// Admin Profile Update
Route::post('/admin/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

// Admin Profile Upload
Route::post('/admin/profile/upload', [AuthController::class, 'uploadPhoto'])->name('profile.upload');

// User Dashboard
Route::get('/user/dashboard', [AuthController::class, 'user_dashboard'])->name('user.dashboard');

// User Profile Page
Route::get('/user/profile', [AuthController::class, 'userprofile'])->name('user.profile');

// User Profile Update
Route::post('/user/profile/update', [AuthController::class, 'userupdateProfile'])->name('user_profile.update');

// User Profile Upload
Route::post('/user/profile/upload', [AuthController::class, 'useruploadPhoto'])->name('user_profile.upload');

// Menu to Display in Home Page
Route::get('/home', [MenuController::class, 'index'])->name('home');

// Admin Manage Record
Route::get('/admin/manage_record', [MenuController::class, 'adminIndex'])->name('admin.manage.record');

// Add Coffee Record
Route::post('/admin/menu/store', [MenuController::class, 'store'])->name('menu.store');

// Update Record
Route::post('/admin/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');

// Delete Record
Route::post('/admin/menu/delete/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');