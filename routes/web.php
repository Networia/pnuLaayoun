<?php

use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\demo\inputController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
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

    //Product
    Route::prefix('produits')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('Product');
        //Route::get('api', [ProductController::class, 'api'])->name('Product.api');
        Route::get('pnu', [ProductController::class, 'pnu'])->name('Product.pnu');
        Route::get('filter', [ProductController::class, 'filterapi'])->name('Product.filter');
        Route::get('battrie', [ProductController::class, 'battrieapi'])->name('Product.battrieapi');
        Route::get('chambriere', [ProductController::class, 'chambriereapi'])->name('Product.chambriereapi');
        Route::get('huile', [ProductController::class, 'huileapi'])->name('Product.huileapi');
        Route::get('select', [ProductController::class, 'list_select'])->name('Product.list_select');
        Route::get('autocomplete', [ProductController::class, 'autocomplete'])->name('Product.autocomplete');
        Route::get('create', [ProductController::class, 'create'])->name('Product.create');
        Route::post('store', [ProductController::class, 'store'])->name('Product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('Product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('Product.update');
        Route::get('purchase', [ProductController::class, 'purchase'])->name('Product.purchase');
        Route::post('purchase/store', [PurchaseController::class, 'store'])->name('Product.CretePurchase');
    });

    //Purchase
    Route::prefix('purchase')->group(function () {
        Route::get('', [PurchaseController::class, 'index'])->name('Purchase');
        //Route::get('api', [PurchaseController::class, 'api'])->name('Purchase.api');
        // Route::get('select', [PurchaseController::class, 'list_select'])->name('Purchase.list_select');
        // Route::get('create', [PurchaseController::class, 'create'])->name('Purchase.create');
        // Route::post('store', [PurchaseController::class, 'store'])->name('purchase.store');
        // Route::get('edit/{id}', [PurchaseController::class, 'edit'])->name('Purchase.edit');
        // Route::post('update/{id}', [PurchaseController::class, 'update'])->name('Purchase.update');
        // Route::get('purchase', [PurchaseController::class, 'purchase'])->name('Purchase.purchase');
    });


    //Supplier
    Route::prefix('supplier')->group(function () {
        Route::get('', [SupplierController::class , 'index'])->name('supplier');
        Route::get('api', [SupplierController::class , 'api'])->name('supplier.api');
        Route::get('select', [SupplierController::class , 'list_select'])->name('supplier.list_select');
        // Route::get('select/product', [SupplierController::class , 'list_select_product'])->name('product.list_select'); // just for supplier
        Route::get('create', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('store', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::post('update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    });

    //Client
    Route::prefix('client')->group(function () {
        Route::get('', [ClientController::class, 'index'])->name('client');
        Route::get('api', [ClientController::class, 'api'])->name('client.api');
        // Route::get('select', [ClientController::class , 'list_select'])->name('client.list_select');
        // Route::get('select/product', [ClientController::class , 'list_select_product'])->name('product.list_select'); // just for client
        Route::get('create', [ClientController::class, 'create'])->name('client.create');
        Route::post('store', [ClientController::class, 'store'])->name('client.store');
        Route::get('edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
        Route::post('update/{id}', [ClientController::class, 'update'])->name('client.update');
        Route::get('profil/{id}', [ClientController::class, 'showProfile'])->name('client.profil');
        Route::get('clients-by-stock-id', [ClientController::class, 'getClientByStockId'])->name('client.byStock');
    });

    //Cheque
    Route::prefix('check')->group(function () {
        Route::get('', [CheckController::class, 'index'])->name('check');
        Route::get('api', [CheckController::class, 'api'])->name('check.api');
        // Route::get('select', [CheckController::class , 'list_select'])->name('check.list_select');
        // Route::get('select/product', [CheckController::class , 'list_select_product'])->name('product.list_select'); // just for check
        Route::get('create', [CheckController::class, 'create'])->name('check.create');
        Route::post('store', [CheckController::class, 'store'])->name('check.store');
        Route::get('edit/{id}', [CheckController::class, 'edit'])->name('check.edit');
        Route::post('update/{id}', [CheckController::class, 'update'])->name('check.update');
    });

    //stati
    Route::prefix('statistics')->group(function () {
        Route::get('/', [StatisticController::class, 'index'])->middleware('role:admin')->name('statistic');
        Route::get('years/db', [StatisticController::class, 'years'])->middleware('role:admin')->name('statistic.years');
        Route::get('chart/vente/services/{chart_vente_services_year?}', [StatisticController::class, 'chart_vente_services'])->middleware('role:admin')->name('statistic.chart.vente.services');
        Route::get('chart/vente/produits/{chart_vente_produits_year?}', [StatisticController::class, 'chart_vente_produits'])->middleware('role:admin')->name('statistic.chart.vente.produits');
    });
    Route::prefix('stocks')->group(function () {
        Route::get('', [StockController::class, 'index'])->name('Stock');
        Route::get('api', [StockController::class, 'api'])->name('Stock.api');
        Route::get('select', [StockController::class, 'list_select'])->name('stock.list_select');
        Route::get('create', [StockController::class, 'create'])->name('Stock.create');
        Route::post('store', [StockController::class, 'store'])->name('Stock.store');
        Route::get('edit/{id}', [StockController::class, 'edit'])->name('Stock.edit');
        Route::post('update/{id}', [StockController::class, 'update'])->name('Stock.update');
        Route::get('edit/user/{id}', [StockController::class, 'edit_user_in_stock'])->name('stock.user.edit');
        Route::post('update/user/{id}', [StockController::class, 'update_user_in_stock'])->name('stock.user.update');
    });

    Route::prefix('categorie')->group(function () {
        Route::get('', [CategorieController::class, 'index'])->name('Categorie');
        Route::get('api', [CategorieController::class, 'api'])->name('Categorie.api');
        Route::get('select', [CategorieController::class, 'list_select'])->name('categorie.list_select');
        Route::get('create', [CategorieController::class, 'create'])->name('Categorie.create');
        Route::post('store', [CategorieController::class, 'store'])->name('Categorie.store');
        Route::get('edit/{id}', [CategorieController::class, 'edit'])->name('Categorie.edit');
        Route::post('update/{id}', [CategorieController::class, 'update'])->name('Categorie.update');
    });

    Route::prefix('sales')->group(function () {
        Route::get('create', [SalesController::class, 'create'])->name('sales.create');
        Route::get('autocomplete', [SalesController::class, 'autocomplete'])->name('autocomplete');
       // Route::post('store', [SalesController::class, 'store'])->name('sales.store');

    });
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
