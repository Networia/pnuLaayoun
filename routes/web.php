<?php

use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\demo\inputController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [StaterkitController::class, 'home'])->name('home');
    Route::get('home', [StaterkitController::class, 'home'])->name('home');
    // Route Components
    Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
    Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
    Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');

    Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->middleware('password.confirm')->name('layout-full'); // check password after contue
    Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->middleware('verified')->name('layout-blank');
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
