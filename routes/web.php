<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutbtnController;
use App\Http\Controllers\deleteCheckoutController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\addToCartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\produkPerPageController;
use App\Http\Controllers\addPerPageController;
use App\Http\Controllers\detailProdukController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\contactUsController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\OngkirController;



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
// routes/web.php
Route::post('transaction', [transactionController::class, 'addTransactionDeleteCart'])->name('transaction');
Route::get('detailShipping', [transactionController::class, 'shippingDetail'])->name('detailShipping');

Route::get('logout', [logoutbtnController::class, 'logout'])->name('logout');

Route::get('checkout', [checkoutController::class, 'displayCart'])->name('checkoutPage');

Route::get('payment', [paymentController::class, 'paymentCart'])->name('paymentPage');
// Route::delete('paymentDelete', [paymentController::class, 'deleteProduk'])->name('paymentDelete');

// Route::post('addtocart', 'ProductCart@addToCart')->name('addToCart');
Route::post('addToCartFromShop', [addToCartController::class, 'addToCart'])->name('addToCart');
Route::get('checkout/{productName}', [deleteCheckoutController::class, 'removeItem'])->name('removeItem');


//Route::delete('deleteCheckout/{abcde}', [::class, ''])->name('deleteCheckout');
Route::get('checkout', [CheckoutController::class, 'displayCart'])->name('cart');

Route::get('a', function () {
    return view('welcome');
}) -> name('a');
Route::post('login', [LoginController::class, 'login'])->name('login');


Route::get('login', function () {
    return view('login');
}) -> name('loginPageGet');

Route::get('detailproduk', [detailProdukController::class, 'showDetail'])->name('detailproduk');

Route::get('register', function () {
    return view('register');
}) -> name('registerPageGet');

Route::Post('register', [registerController::class, 'register']) -> name('register');


Route::get('index', [produkPerPageController::class, 'indexProduk'])->name('index');



// Route::get('index', function () {
//     return view('index');
// }) -> name('index');

Route::get('team', function () {
    return view('team');
}) -> name('teamPage');

Route::get('fixOrder', function () {
    return view('fixOrder');
}) -> name('fixOrder');



Route::get('shop', [ProdukController::class, 'produk'])->name('shop');
// Route::get('shop/search', [ProdukController::class, 'searchProduk'])->name('shop.search');


// Route::get('shop', [produkController::class, 'produk']) -> name('shop');

Route::get('index', [produkPerPageController::class, 'indexProduk'])->name('index');



Route::get('contact', [contactUsController::class, 'contactUs'])->name('contact');
Route::post('contact', [contactUsController::class, 'contactUsPost'])->name('contactPost');


Route::get('converse black', function () {
     return view('converse black');
}) -> name('detailConverseBlack');

Route::get('converse grey', function () {
    return view('converse grey');
}) -> name('detailConverseGrey');

Route::get('single', function () {
    return view('single');
}) -> name('detailConverseSingle');

Route::get('experiance', function () {
    return view('experiance');
}) -> name('detailConverseGrey');

Route::get('nb 550', function () {
    return view('nb 550');
}) -> name('detailNewBalance 550');

Route::get('nb black', function () {
    return view('nb black');
}) -> name('detailNewBalanceBlack');

Route::get('nb pink', function () {
    return view('nb pink');
}) -> name('detailNewBalancePink');

Route::get('nb 550', function () {
    return view('nb 550');
}) -> name('detailNewBalance 550');

Route::get('nike pink', function () {
    return view('nike pink');
}) -> name('detailNikePink');

Route::get('nike white', function () {
    return view('nike white');
}) -> name('detailNikeWhite');

Route::get('nike tiffany', function () {
    return view('nike tiffany');
}) -> name('detailNikeTiffany');

Route::get('puma black', function () {
    return view('puma black');
}) -> name('detailPumaBlack');


Route::get('detailproduk1', [produkPerPageController::class, 'produkPerPage'])->name('pumaRedDetail');
Route::post('detailproduk1', [addPerPageController::class, 'addToCartPage'])->name('addToCartPage');

Route::delete('fixOrder', [paymentController::class, 'deleteProduk'])->name('deleteProduk');


// Route::get('payment', function () {
//     return view('payment');
// }) -> name('payment');

Route::get('puma grey', function () {
    return view('puma grey');
}) -> name('detailPumaGrey');

Route::get('rebook white', function () {
    return view('rebook white');
}) -> name('detailRebookWhite');

Route::get('rebook pink', function () {
    return view('rebook pink');
}) -> name('detailRebookPink');

Route::get('rebook black', function () {
    return view('rebook black');
}) -> name('detailRebookBlack');

Route::get('vans old bw', function () {
    return view('vans old bw');
}) -> name('detailVansOldBw');

Route::get('vans snake', function () {
    return view('vans snake');
}) -> name('detailVansSnake');

Route::get('vans triple', function () {
    return view('vans triple');
}) -> name('detailVansTriple');



Route::post('insertProduk', [produkController::class, 'insertProduk']) -> name('insertProduk'); 


Route::get("/check", [CookieController::class, 'check']);

Route::get('cek-ongkir', [OngkirController::class, 'index']);
Route::post('cek-ongkir', [OngkirController::class, 'cekOngkir']);
