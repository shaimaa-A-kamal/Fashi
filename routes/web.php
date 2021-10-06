<?php


use App\Http\Controllers\Blog\blogController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\faqController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\Shopping\cartController;
use App\Http\Controllers\Shopping\checkOutController;
use App\Http\Controllers\Shopping\productController;
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

Route::get('/',[indexController::class,'index'])->name('index');


Route::get('/blog',[blogController::class,'blogs'])->name('blog');
Route::get('/blog/{blog_id?}',[blogController::class,'blog'] )->name('blogDetails');


Route::get('/shop',[productController::class,'products'])->name('shop');
Route::get('/shop/{product_id?}',[productController::class,'product'] )->name('product');

route::group(['middleware'=>'verified'],function(){
Route::get('/shopping-cart',[cartController::class,'cart'])->name('cart');

Route::get('/check-out',[checkOutController::class,'checkout'])->name('checkOut');
Route::post('/check-out',[checkOutController::class,'placeOrder'])->name('placeOrder');

Route::get('/contact',[contactController::class ,'contact'])->name('contact');
Route::post('/contact',[contactController::class ,'sendFeedback'])->name('sendFeedback');

});

Route::get('/faq',[faqController::class,'faq'])->name('faq');










