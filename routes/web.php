<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books',[BookController::class,'index'])->middleware(['auth', 'verified'])->name('books');
Route::get('/books/{slug}',[BookController::class,'show'])->middleware(['auth', 'verified']);
Route::get('/books/create',[BookController::class,'create'])->middleware(['auth', 'verified']);
Route::post('/books/create',[BookController::class,'store'])->middleware(['auth', 'verified']);

Route::get('/users/create', [UsersController::class,'create'])->middleware(['auth', 'verified']);
Route::get('/users', [UsersController::class,'index'])->middleware(['auth', 'verified'])->name('users');
Route::get('/users/{user}/edit', [UsersController::class, 'edit']);
Route::post('/users/create', [UsersController::class, 'store']);
Route::patch('/users', [UsersController::class, 'update'])->name('user.update');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/users/{user}', [UsersController::class,'destroy'])->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
