<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Auth::routes();
});


Route::get('/home', [UserController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {  
   Route::get('/addUser', [UserController::class, 'create'])->name('user.add');
   Route::post('/storeUser', [UserController::class, 'store'])->name('user.store');
   Route::get('/editUser/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
   Route::post('/updateUser/{id}', [UserController::class, 'update'])->name('user.update');
   Route::get('/deleteUser/{id}', [UserController::class, 'destroy'])->name('user.delete');
});
