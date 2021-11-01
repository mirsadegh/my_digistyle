<?php

use App\Http\Controllers\Admin\ProductGalleryController;

Route::get('/',function (){

      return view('admin.dashboard.index');
});

Route::resource('/users',\App\Http\Controllers\Admin\UserController::class);
Route::resource('/orders',\App\Http\Controllers\Admin\OrderController::class);
Route::get('/orders/{order}/payment',[\App\Http\Controllers\Admin\OrderController::class,'payments'])->name('orders.payments');
Route::resource('/products',\App\Http\Controllers\Admin\ProductController::class);
Route::resource('products.gallery', ProductGalleryController::class);

Route::get('comments',[\App\Http\Controllers\Admin\CommentController::class,'index'])->name('comments');
Route::delete('comments/delete/{comment}',[\App\Http\Controllers\Admin\CommentController::class,'destroy'])->name('comments.destroy');
Route::get('/changeApproved/{id}',[\App\Http\Controllers\Admin\CommentController::class,'changeApproved'])->name('changeApproved');
Route::get('/changeUnApproved/{id}',[\App\Http\Controllers\Admin\CommentController::class,'changeUnApproved'])->name('changeUnApproved');
Route::resource('categories',\App\Http\Controllers\Admin\CategoryController::class)->except('show');
Route::post('attribute/values',[\App\Http\Controllers\Admin\AttributeController::class,'getValues']);
Route::resource('discounts',\App\Http\Controllers\Admin\DiscountController::class)->except('show');
