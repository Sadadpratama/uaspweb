<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Route::get('/create', function () {
    return view('create');
});

Route::post('/post', [PostController::class, 'store']);
Route::delete('/delete/{id}', [PostController::class, 'destroy']);
Route::get('/edit/{id}', [PostController::class, 'edit']);

Route::delete('/deleteimage/{id}', [PostController::class, 'deleteimage']);
Route::delete('/deletecover/{id}', [PostController::class, 'deletecover']);

Route::put('/update/{id}', [PostController::class, 'update']);

// Tambahkan rute login di sini
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Tambahkan rute yang memerlukan autentikasi di sini
Route::get('/dashboard', function () {
    return view('index'); // Ini adalah file index.blade.php yang telah Anda unggah
})->middleware('auth');
