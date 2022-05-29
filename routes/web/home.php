<?php

use App\Http\Controllers\CategoryController;

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
Route::get('/404', [\App\Http\Controllers\HomeController::class,'notFound'])->name('notFound');
Route::get('/about',[\App\Http\Controllers\HomeController::class,'about'])->name('about');
Route::get('/contact',[\App\Http\Controllers\HomeController::class,'contact'])->name('contact');
Route::get('/home', [\App\Http\Controllers\HomeController::class,'home'])->name('home');
Route::get('/api/cities/{provinceId}',[\App\Http\Controllers\Auth\RegisterController::class,'getAllCites']);

Route::post('search',[\App\Http\Controllers\SearchController::class,'search'])->name('search');
Route::get('searchPage',[\App\Http\Controllers\SearchController::class,'searchPage'])->name('searchPage');
Route::post('searchPage',[\App\Http\Controllers\SearchController::class,'searchPages']);
Route::post('search/sort',[\App\Http\Controllers\SearchController::class,'sortSearch'])->name('sort.search');

Auth::routes(['verify'=>true]);
Route::get('/secret',function (){
     return 'secret';
})->middleware(['auth','password.confirm']);


Route::get('products',[App\Http\Controllers\ProductController::class,'index']);
Route::get('gallery/{product}',[App\Http\Controllers\GalleryController::class,'index'])->name('product.gallery');

Route::get('products/{product}',[App\Http\Controllers\ProductController::class,'single'])->name('singleProduct');
Route::get('/categories/{category:slug}/{childs:slug?}/{childs2?}', [CategoryController::class,'showProductsCategory'])->name('products.category');

Route::post('cart/add/{product}',[\App\Http\Controllers\CartController::class,'addToCart'])->name('cart.add');
Route::get('cart',[\App\Http\Controllers\CartController::class,'cart']);
Route::delete('cart/delete/{cart}',[\App\Http\Controllers\CartController::class,'destroy'])->name('cart.destroy');
Route::patch('cart/quantity/change',[\App\Http\Controllers\CartController::class,'quantityChange']);
Route::post('discount/check',[\App\Http\Controllers\DiscountController::class,'check'])->name('cart.discount.check');
Route::delete('discount/delete',[\App\Http\Controllers\DiscountController::class,'destroy']);

Route::get('compare',[\App\Http\Controllers\CompareController::class,'compare'])->name('compare');
Route::post('compare/add/{product}',[\App\Http\Controllers\CompareController::class,'addCompare'])->name('addCompare');
Route::delete('compare/delete/{product}',[\App\Http\Controllers\CompareController::class,'deleteCompare'])->name('deleteCompare');



Route::get('/showFavorites',[\App\Http\Controllers\FavoriteController::class,'showFavorites'])->name('showFavorites');
Route::get('/favorite/{product}',[\App\Http\Controllers\FavoriteController::class,'favoriteProduct'])->name('favorite');
Route::get('/unFavorite/{product}',[\App\Http\Controllers\FavoriteController::class,'unFavoriteProduct'])->name('unFavorite');
Route::get('/unFavoriteWishlist/{product}',[\App\Http\Controllers\FavoriteController::class,'unFavoriteWishlist'])->name('unFavoriteWishlist');


Route::middleware('auth')->group(function (){
    Route::post('comments',[App\Http\Controllers\HomeController::class,'comments'])->name('send.comment');
    Route::post('add-rating',[App\Http\Controllers\RatingController::class,'add'])->name('add.rate');
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
