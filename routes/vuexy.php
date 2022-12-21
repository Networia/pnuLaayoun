<?php

use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\demo\inputController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CheckController;
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

    Route::prefix('settings')->group(function () {
        Route::get('account', [SettingController::class, 'account'])->name('settings.account');
        Route::post('account/image', [SettingController::class, 'account_image'])->name('settings.account.image');
        Route::get('security', [SettingController::class, 'security'])->name('settings.security');
    });
    
    Route::prefix('user')->middleware(['verified','password.confirm'])->group(function () {
        Route::get('', [UserController::class , 'list'])->middleware('can:user_list')->name('user.list');
        Route::get('api', [UserController::class , 'api'])->middleware('can:user_list')->name('user.api');
        Route::post('store', [UserController::class , 'store'])->middleware('can:user_create')->name('user.store');
        Route::get('change/status/{id}', [UserController::class , 'status'])->middleware('can:user_status')->name('user.status');
        Route::get('detail/{id}', [UserController::class , 'detail'])->middleware('can:user_info')->name('user.detail');
        Route::post('detail/update/{id}', [UserController::class , 'update'])->middleware('can:user_info')->name('user.update');
        Route::get('security/{id}', [UserController::class , 'security'])->middleware('can:user_password')->name('user.security');
        Route::post('security/password/{id}', [UserController::class , 'password'])->middleware('can:user_password')->name('user.security.password');
        Route::get('security/tsv/{id}', [UserController::class , 'tsv'])->middleware('can:user_2fa')->name('user.security.tsv');
        Route::get('stock/edit/{id}', [UserController::class,'edit_user_stock'])->name('user.edit.stock');
        Route::post('stock/update/{id}', [UserController::class,'update_user_stock'])->name('user.update.stock');

    });

    Route::prefix('role')->middleware(['verified','password.confirm','role:admin'])->group(function () {
        Route::get('', [RolePermissionController::class , 'index'])->name('role');
        Route::post('create', [RolePermissionController::class , 'create'])->name('role.create');
        Route::get('edit/{id}', [RolePermissionController::class , 'edit'])->name('role.edit');
        Route::post('update/{id}', [RolePermissionController::class , 'update'])->name('role.update');
    });

    Route::prefix('test')->group(function () {
        Route::get('', [TestController::class , 'index'])->name('test');
        Route::get('api', [TestController::class , 'api'])->name('test.api');
        Route::get('select', [TestController::class , 'list_select'])->name('test.list_select');
        Route::get('select/product', [TestController::class , 'list_select_product'])->name('product.list_select'); // just for test
        Route::get('create', [TestController::class , 'create'])->name('test.create');
        Route::post('store', [TestController::class , 'store'])->name('test.store');
        Route::get('edit/{id}', [TestController::class , 'edit'])->name('test.edit');
        Route::post('update/{id}', [TestController::class , 'update'])->name('test.update');
    });

    

    Route::prefix('demos')->group(function () {
        Route::get('form/element', [inputController::class , 'index'])->name('demo.input');

    });
});