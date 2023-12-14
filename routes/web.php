<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Back\{
    AdminController,
    WalletSalesCostStatementController,
    WalletSellerMoneyTransferListController,
    WalletSellersController,
    WalletOrderListController,
};

use App\Http\Controllers\Front\MenuController as FrontController;
use App\Http\Controllers\UserController;

use UniSharp\LaravelFilemanager\Lfm;
/*
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'auth'], function () {
    Lfm::routes();
});
 */

// Home
Route::name('home')->get('/', [FrontController::class, 'index']);
Route::name('category')->get('category/{category:slug}', [FrontController::class, 'category']);
Route::name('author')->get('author/{user}', [FrontController::class, 'user']);
Route::name('tag')->get('tag/{tag:slug}', [FrontController::class, 'tag']);

Route::prefix('menus')->group(function () {
    Route::name('menus.display')->get('{slug}', [FrontController::class, 'show']);
    Route::name('menus.search')->get('', [FrontController::class, 'search']);
});
/////////Users///////////////////////////////
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/', [UserController::class, 'show']);
});

Route::resource('users', UserController::class);

/////////////////////Users////////////////////////////////

Route::prefix('users')->group(function () {
    Route::get('/AllUsers', [UserController::class, 'AllUsers']);

    Route::get('/detailUser/{id}', [UserController::class, 'detailUser']);
});

Route::get('advance', 'UserController@advance')->name('advance_search');
//Route::get('changeStatus', 'UserController@changeStatus');
Route::get('user/{id}', [UserController::class, 'changeStatus']);
Route::get('/users/simple', 'UserController@simple')->name('simple_search');
//Route::get('/users/advance', 'UserController@advance')->name('advance_search');
Route::get('users-filter', [\App\Http\Controllers\UserController::class, 'filter'])->name('users.filter');

////////////////Cüzdan Satıcıları///////////////////
Route::resource('WalletSellers', WalletSellersController::class);
Route::get('walletSellers-filter', [WalletSellersController::class, 'filter'])->name('walletSellers.filter');



////////////////Cüzdan Satıcıları Para Transfer İşlemleri/////////////////////////
Route::resource('walletSellerMoneyTransferLists', WalletSellerMoneyTransferListController::class);
Route::get('walletSellerMoneyTransferLists-filter', [WalletSellerMoneyTransferListController::class, 'filter'])->name('walletSellerMoneyTransferLists.filter');
//Route::resource('walletSellerMoneyTransferLists', WalletSellerMoneyTransferListController::class);

Route::get('walletSellerMoneyTransferLists-individual', [WalletSellerMoneyTransferListController::class, 'individual'])->name('walletSellerMoneyTransferLists.individual');
Route::get('walletSellerMoneyTransferLists-corporate', [WalletSellerMoneyTransferListController::class, 'corporate'])->name('walletSellerMoneyTransferLists.corporate');
Route::get('walletSellerMoneyTransferLists-actifUser', [WalletSellerMoneyTransferListController::class, 'actifUser'])->name('walletSellerMoneyTransferLists.actifUser');
Route::get('walletSellerMoneyTransferLists-passifUser', [WalletSellerMoneyTransferListController::class, 'passifUser'])->name('walletSellerMoneyTransferLists.passifUser');




//////////////////Cüzdan Satış Maliyet Tablosu////////////
Route::resource('walletSalesCostStatements', WalletSalesCostStatementController::class);
Route::resource('walletOrderLists', WalletOrderListController::class);
Route::get('walletOrderLists-filter', [WalletOrderListController::class, 'filter'])->name('walletOrderLists.filter');

Route::get('walletOrderLists-individual', [WalletOrderListController::class, 'individual'])->name('walletOrderLists.individual');
Route::get('walletOrderLists-corporate', [WalletOrderListController::class, 'corporate'])->name('walletOrderLists.corporate');
Route::get('walletOrderLists-actifUser', [WalletOrderListController::class, 'actifUser'])->name('walletOrderLists.actifUser');
Route::get('walletOrderLists-passifUser', [WalletOrderListController::class, 'passifUser'])->name('walletOrderLists.passifUser');



Route::prefix('menus')->group(function () {
    Route::name('menus.display')->get('{slug}', [FrontController::class, 'show']);
});

Route::name('category')->get('category/{category:slug}', [FrontController::class, 'category']);

/* Route::get('/', function () {
    return view('welcome');
}); */



Route::name('home')->get('/', [FrontController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::view('/admin', 'admin.dashboard.index');
});

////////BackEnd////////////////

Route::middleware('auth')->group(function () {
Route::prefix('admin')->group(function () {

    // Route::get('/', HomeController::class)->name('home');
    // Dashboard
    //  Route::name('admin')->get('/', [AdminController::class, 'index']);
    Route::view('/admin', 'admin.dashboard.index');
});
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
