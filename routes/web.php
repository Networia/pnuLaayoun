<?php

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

    Route::prefix('settings')->group(function () {
        Route::get('account', [SettingController::class, 'account'])->name('settings.account');
        Route::post('account/image', [SettingController::class, 'account_image'])->name('settings.account.image');
        Route::get('security', [SettingController::class, 'security'])->name('settings.security');
    });

    Route::prefix('user')->middleware(['verified','password.confirm'])->group(function () {
        Route::get('', [UserController::class , 'list'])->name('user.list');
        Route::get('api', [UserController::class , 'api'])->name('user.api');
        Route::post('store', [UserController::class , 'store'])->name('user.store');
        Route::get('change/status/{id}', [UserController::class , 'status'])->name('user.status');
        Route::get('detail/{id}', [UserController::class , 'detail'])->name('user.detail');
        Route::post('detail/update/{id}', [UserController::class , 'update'])->name('user.update');
        Route::get('security/{id}', [UserController::class , 'security'])->name('user.security');
        Route::post('security/password/{id}', [UserController::class , 'password'])->name('user.security.password');
        Route::get('security/tsv/{id}', [UserController::class , 'tsv'])->name('user.security.tsv');

    });

    Route::prefix('test')->group(function () {
        Route::get('', [TestController::class , 'index'])->name('test');
        Route::get('api', [TestController::class , 'api'])->name('test.api');
        Route::get('create', [TestController::class , 'create'])->name('test.create');
        Route::post('store', [TestController::class , 'store'])->name('test.store');
        Route::get('edit/{id}', [TestController::class , 'edit'])->name('test.edit');
        Route::post('update/{id}', [TestController::class , 'update'])->name('test.update');
    });

    Route::prefix('demos')->group(function () {
        Route::get('form/element', [inputController::class , 'index'])->name('demo.input');

    });
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
