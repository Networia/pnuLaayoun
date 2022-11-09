<?php

use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\demo\inputController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
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
    Route::group(['prefix' => 'check'], function () {
        Route::get('/show-view-add', [CheckController::class, 'create'])->name('view-add-check');
        Route::post('/add', [CheckController::class, 'store'])->name('Check.store');
    });
    Route::prefix('produits')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('Product');
        Route::get('api', [ProductController::class, 'api'])->name('Product.api');
        Route::get('select', [ProductController::class, 'list_select'])->name('Product.list_select');
        Route::get('create', [ProductController::class, 'create'])->name('Product.create');
        Route::post('store', [ProductController::class, 'store'])->name('Product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('Product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('Product.update');
    });
    Route::prefix('stocks')->group(function () {
        Route::get('', [StockController::class, 'index'])->name('Stock');
        Route::get('api', [StockController::class, 'api'])->name('Stock.api');
        Route::get('select', [StockController::class, 'list_select'])->name('Stock.list_select');
        Route::get('create', [StockController::class, 'create'])->name('Stock.create');
        Route::post('store', [StockController::class, 'store'])->name('Stock.store');
        Route::get('edit/{id}', [StockController::class, 'edit'])->name('Stock.edit');
        Route::post('update/{id}', [StockController::class, 'update'])->name('Stock.update');
    });
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
