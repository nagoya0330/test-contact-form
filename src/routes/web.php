<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/register', [UserController::class, 'store'])
->name('register.post');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'loginPost'])->name('login.post');

Fortify::registerView(function () {
    return view('auth.register');
});

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');

Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');

Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');

Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');