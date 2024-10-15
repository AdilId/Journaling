<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
    return view('welcome');
});

Route::get('/', [StaticController::class, 'welcome']);
Route::get('about', [StaticController::class, 'about'])->name('about');
Route::get('contact', [StaticController::class, 'contact'])->name('contact');


Route::resource('journals', JournalController::class)->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->name('profile.create')->middleware('guest');
Route::post('register', [RegisterController::class, 'register'])->name('profile.register');
Route::get('login', [LoginController::class, 'loginForm'])->name('profile.loginForm')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('profile.login');
Route::get('logout', [LoginController::class, 'logout'])->name('profile.logout')->middleware('auth');
