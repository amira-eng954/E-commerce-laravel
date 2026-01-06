<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// admin control users , product , catorries, oreders update
Route::middleware('auth','admin')->group(function () {
Route::get("/admin",[HomeController::class,'all'])->name('admin');
Route::get("/bootstrap",[HomeController::class,'black']);//->name('admin');

Route::resources([
    'cats'=>CatController::class,
    'product'=>ProductController::class,
    'users'=>UserController::class
]);


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
  
