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

// Route::get('/', function () {
//     return view('user.home');
// });

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
Route::get("/product",[ProductController::class,'all']);//->name('admin');
Route::get("/product/{id}",[ProductController::class,'show']);//->name('admin');
Route::post("/product",[ProductController::class,'store']);//->name('admin');
Route::get("/pro/create",[ProductController::class,'create']);//->name('admin');
Route::get("/product/edit/{id}",[ProductController::class,'edit']);//->name('admin');
Route::put("/product/{id}",[ProductController::class,'update']);//->name('admin');
Route::get("/product/delete/{id}",[ProductController::class,'delete']);//->name('admin');

Route::get("/bootstrap",[HomeController::class,'black']);//->name('admin');


Route::get('cats',[CatController::class,'all']);
Route::get('cats/{id}',[CatController::class,'select']);
Route::get('cat/create',[CatController::class,'create']);
Route::post('cats',[CatController::class,'store']);
Route::get('cats/edit/{id}',[CatController::class,'edit']);
Route::put('cats/{id}',[CatController::class,'update']);
Route::get('cats/delete/{id}',[CatController::class,'delete']);

Route::get('users',[UserController::class,'all']);
Route::get('users/{id}',[UserController::class,'select']);
Route::get('user/create',[UserController::class,'create']);
Route::post('users',[UserController::class,'store']);
Route::get('users/edit/{id}',[UserController::class,'edit']);
Route::put('users/{id}',[UserController::class,'update']);
Route::get('users/delete/{id}',[UserController::class,'delete']);


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
  
