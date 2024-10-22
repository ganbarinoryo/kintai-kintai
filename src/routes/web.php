<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

//ローカルホストでログインページ表示
Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'stamp']);
});

//日付一覧ページへ
Route::get('/attendance', [UserController::class, 'attendance']);