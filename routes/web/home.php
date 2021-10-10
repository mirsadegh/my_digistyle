<?php


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

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('index');
Route::get('/home', [\App\Http\Controllers\HomeController::class,'home'])->name('home');
Route::get('/api/cities/{provinceId}',[\App\Http\Controllers\Auth\RegisterController::class,'getAllCites']);


Auth::routes(['verify'=>true]);
Route::get('/secret',function (){
     return 'secret';
})->middleware(['auth','password.confirm']);


Route::get('products',[App\Http\Controllers\ProductController::class,'index']);

Route::get('products/{product}',[App\Http\Controllers\ProductController::class,'single'])->name('singleProduct');


Route::post('cart/add/{product}',[\App\Http\Controllers\CartController::class,'addToCart'])->name('cart.add');
Route::get('cart',[\App\Http\Controllers\CartController::class,'cart']);
Route::delete('cart/delete/{cart}',[\App\Http\Controllers\CartController::class,'destroy'])->name('cart.destroy');
Route::patch('cart/quantity/change',[\App\Http\Controllers\CartController::class,'quantityChange']);
Route::post('discount/check',[\App\Http\Controllers\DiscountController::class,'check'])->name('cart.discount.check');
Route::delete('discount/delete',[\App\Http\Controllers\DiscountController::class,'destroy']);

Route::middleware('auth')->group(function (){
    Route::post('comments',[App\Http\Controllers\HomeController::class,'comments'])->name('send.comment');
    Route::post('payment',[\App\Http\Controllers\PaymentController::class,'payment'])->name('cart.payment');
    Route::get('payment/callback',[\App\Http\Controllers\PaymentController::class,'callback'])->name('payment.callback');
    Route::prefix('profile')->group(function(){
        Route::get('/',[\App\Http\Controllers\Profile\ProfileController::class,'index'])->name('profile.index');
        Route::get('/edit/{user}',[App\Http\Controllers\Profile\ProfileController::class,'edit'])->name('profile.edit');
        Route::get('cities/{provinceId}',[App\Http\Controllers\Profile\ProfileController::class,'getAllCities']);
        Route::post('/update/{user}',[App\Http\Controllers\Profile\ProfileController::class,'update'])->name('profile.update');
        Route::get('/change-password',[App\Http\Controllers\Profile\ProfileController::class,'changePassword'])->name('profile.change-password');
        Route::post('/change-password',[App\Http\Controllers\Profile\ProfileController::class,'updatePassword']);
        Route::get('/orders',[App\Http\Controllers\Profile\OrderController::class,'index'])->name('profile.orders');
        Route::get('/orders/{order}',[App\Http\Controllers\Profile\OrderController::class,'showDetails'])->name('profile.orders.detail');
        Route::get('/orders/{order}/payment',[App\Http\Controllers\Profile\OrderController::class,'payment'])->name('profile.orders.payment');
    

     });


});
