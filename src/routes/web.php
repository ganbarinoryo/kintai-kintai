<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClockController;
use App\Http\Controllers\BreakTimeController;
use Illuminate\Support\Facades\Auth;

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

// ログイン後に stamp ページを表示する
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/', [ClockController::class, 'showStampPage'])->name('stamp');
    Route::post('/clock-in', [ClockController::class, 'clockIn'])->name('clock.in');
    Route::post('/clock-out', [ClockController::class, 'clockOut'])->name('clock.out');
    Route::post('/break/start', [BreakTimeController::class, 'start'])->name('break.start');
    Route::post('/break/end', [BreakTimeController::class, 'end'])->name('break.end');
});

//ページネーション
Route::get('/attendance', [UserController::class, 'attendance'])->name('attendance');