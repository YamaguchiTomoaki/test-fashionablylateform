<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);
//Route::get('/register', [AdminController::class, 'register']);
//Route::get('/login', [AdminController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin']);
    Route::get('/search', [AdminController::class, 'search']);
    Route::post('/delete', [AdminController::class, 'destroy']);
});
