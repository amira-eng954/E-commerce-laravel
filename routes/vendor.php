<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Vendor\dashboardController;
use App\Http\Controllers\vendor\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;







Route::group(['prefix'=>'vendor','as'=>"vendor."],function(){
  
Route::get('/dashboard',[dashboardController::class, 'dashboard'])->name('dashboard');
Route::resource(
   // 'cats'=>CatController::class,
    'products',ProductController::class,
    //'users',UserController::class
);
});


//Route::get('notification/admin',[NotificationController::class,'notifications'])->name('notification.admin');



/////end admin


 

