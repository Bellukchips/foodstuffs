<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\FoodStuffsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\DashboardUser;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\UserController;
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

/**
 * route for authentication
 */
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('registerPost');


/**
 * route for role admin
 * using middleware checkroles
 */
Route::middleware('checkRoles:ADMIN')->group(function () {
    //route dashboard admin
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboardAdmin');
    // route categorie
    Route::resource('/admin/categories', CategoriesController::class);
    //route('banner')
    Route::resource('/admin/banners',BannersController::class);
    //route product
    Route::resource('/admin/foodstuffs',FoodStuffsController::class);
});

/**
 * route for role user
 * using middleware checkroles
 */
Route::middleware('checkRoles:USER')->group(function () {
    //route page user
    Route::get('/foodstuffs', [UserController::class, 'index'])->name('dashboardUser');
    //route dashbaord user
    Route::get('/foodstuffs/dashboard', [UserController::class, 'goToDashboard'])->name('goToDashboard');
    //route dashbaord transaction
    Route::get('/foodstuffs/dashboard/transaction', [UserController::class, 'goToTransactionDashboard'])->name('goToTransactionDashboard');
    //route dashbaord transaction
    Route::get('/foodstuffs/dashboard/settings', [UserController::class, 'goToStoreSettings'])->name('goToStoreSettings');
    //route dashbaord account
    Route::get('/foodstuffs/dashboard/account', [UserController::class, 'goToAccount'])->name('goToAccount');
    //route edit product dashboard
    Route::get('/foodstuffs/dashboard/product/show', [UserController::class, 'showDetailTransaction'])->name('showDetailTransaction');

    //route update account
    Route::post('/foodstuffs/dashboard/account', [DashboardUser::class, 'updateAccount'])->name('updateAccount');
    // save store settings
    Route::post('/foodstuffs/dashboard/settings',[DashboardUser::class,'saveStoreSettings'])->name('saveStoreSettings');
    //  product
    Route::resource('/foodstuffs/dashboard/product',ProductController::class);
});
