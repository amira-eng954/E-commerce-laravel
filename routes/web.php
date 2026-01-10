<?php

use App\Http\Controllers\Backend\CatController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\orderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


// Route::get('/admin/dashboard', function () {
//     return view('');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::resource('product',ProductController::class);
// admin control users , product , catorries, oreders update
Route::middleware('auth','admin')->group(function () {
Route::get("/admin/dashboard",[HomeController::class,'all'])->name('dashboard');
Route::get("/bootstrap",[HomeController::class,'black']);//->name('admin');


//********************************softDelete Products***************************** *// 
Route::get('product/trash',[ProductController::class, 'productTrash'])->name('products.trash');
Route::get('product/restore/{id}',[ProductController::class, 'productrestore'])->name('products.restore');
Route::get('product/destroy/{id}',[ProductController::class, 'productdestroy'])->name('products.destroy');
/*****************************************end softDelete ************************************ */


Route::resources([
    'cats'=>CatController::class,
    'product'=>ProductController::class,
    'users'=>UserController::class
]);

Route::get('notification/admin',[NotificationController::class,'notifications'])->name('notification.admin');
Route::get('adminorder',[OrderController::class,'adminorders']);
Route::get('order_update/{id}',[OrderController::class,'edit']);
Route::put('order/{id}',[OrderController::class,'update']);
Route::get('order_delete/{id}',[OrderController::class,'delete']);

});
/////end admin


// users can request orders
Route::middleware('auth')->group(function () {
 Route::get('All_order',[orderController::class ,'allorder']);   
Route::post('order',[orderController::class ,'create_order']);
Route::get('amira',[orderController::class ,'delete_carts']);
Route::get('carts/',[CartController::class ,'all']);
Route::post('cart/{id}',[CartController::class ,'carts']);
Route::get('cart/{id}',[CartController::class ,'delete']);
Route::get('cart/',[CartController::class ,'confirm']);
});
///end order user

// redirect website

 Route::get("/",[HomeController::class,'index']);//->name('redirect');
 Route::get("/redirect",[HomeController::class,'index']);//->name('redirect');
 Route::get('cat/{id}',[HomeController::class,'cats']);//->name('redirect');
 Route::get('show/{id}',[HomeController::class,'oneproduct']);//->name('redirect');
 Route::get('about',[HomeController::class,'about']);//->name('redirect');
 Route::get('contact',[HomeController::class,'contact']);//->name('redirect');
require __DIR__.'/auth.php';
require __DIR__.'/vendor.php'; 
