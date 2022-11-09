<?php

use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\demo\inputController;
use App\Http\Controllers\ProductController;
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
        Route::get('/show-view-add',[CheckController::class,'create'])->name('view-add-check');
        Route::post('/add',[CheckController::class,'store'])->name('Check.store');
    });

    //Product
    Route::prefix('produits')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('Product');
        Route::get('api', [ProductController::class, 'api'])->name('Product.api');
        Route::get('select', [ProductController::class, 'list_select'])->name('Product.list_select');
        Route::get('create', [ProductController::class, 'create'])->name('Product.create');
        Route::post('store', [ProductController::class, 'store'])->name('Product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('Product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('Product.update');
        Route::get('purchase', [ProductController::class, 'purchase'])->name('Product.purchase');
    });

    //Supplier
    Route::prefix('supplier')->group(function () {
        Route::get('', [SupplierController::class , 'index'])->name('supplier');
        Route::get('api', [SupplierController::class , 'api'])->name('supplier.api');
        // Route::get('select', [SupplierController::class , 'list_select'])->name('supplier.list_select');
        // Route::get('select/product', [SupplierController::class , 'list_select_product'])->name('product.list_select'); // just for supplier
        Route::get('create', [SupplierController::class , 'create'])->name('supplier.create');
        Route::post('store', [SupplierController::class , 'store'])->name('supplier.store');
        Route::get('edit/{id}', [SupplierController::class , 'edit'])->name('supplier.edit');
        Route::post('update/{id}', [SupplierController::class , 'update'])->name('supplier.update');
    });

    //Client
    Route::prefix('client')->group(function () {
        Route::get('', [ClientController::class , 'index'])->name('client');
        Route::get('api', [ClientController::class , 'api'])->name('client.api');
        // Route::get('select', [ClientController::class , 'list_select'])->name('client.list_select');
        // Route::get('select/product', [ClientController::class , 'list_select_product'])->name('product.list_select'); // just for client
        Route::get('create', [ClientController::class , 'create'])->name('client.create');
        Route::post('store', [ClientController::class , 'store'])->name('client.store');
        Route::get('edit/{id}', [ClientController::class , 'edit'])->name('client.edit');
        Route::post('update/{id}', [ClientController::class , 'update'])->name('client.update');
        Route::get('profil/{id}', [ClientController::class, 'showProfile'])->name('client.profil');
    });

    //Cheque
    Route::prefix('check')->group(function () {
        Route::get('', [CheckController::class , 'index'])->name('check');
        Route::get('api', [CheckController::class , 'api'])->name('check.api');
        // Route::get('select', [CheckController::class , 'list_select'])->name('check.list_select');
        // Route::get('select/product', [CheckController::class , 'list_select_product'])->name('product.list_select'); // just for check
        Route::get('create', [CheckController::class , 'create'])->name('check.create');
        Route::post('store', [CheckController::class , 'store'])->name('check.store');
        Route::get('edit/{id}', [CheckController::class , 'edit'])->name('check.edit');
        Route::post('update/{id}', [CheckController::class , 'update'])->name('check.update');
    });

    //stati
    Route::prefix('statistics')->group( function () {
        Route::get('/', [StatisticController::class , 'index'])->middleware('role:admin')->name('statistic');
        Route::get('years/db', [StatisticController::class , 'years'])->middleware('role:admin')->name('statistic.years');
        Route::get('chart/vente/services/{chart_vente_services_year?}', [StatisticController::class , 'chart_vente_services'])->middleware('role:admin')->name('statistic.chart.vente.services');
        Route::get('chart/vente/produits/{chart_vente_produits_year?}', [StatisticController::class , 'chart_vente_produits'])->middleware('role:admin')->name('statistic.chart.vente.produits');
    });
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
