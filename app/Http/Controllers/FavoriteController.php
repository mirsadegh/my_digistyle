<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function showFavorites()
    {
           $user = \Auth::id();
           $user = User::find($user);
           $products = $user->favorites;

           return view('Frontend.profile.wishlist',compact('products'));
    }

    public function favoriteProduct(Product $product)
    {
        \Auth::user()->favorites()->attach($product->id);
        return response()->json(['status' =>200,'message' => 'به صفحه علاقه مندی ها با موفقیت افزوده شد.']);

    }
    public function unFavoriteProduct(Product $product)
    {
        \Auth::user()->favorites()->detach($product->id);
        return response()->json(['status' =>200,'message'=>'از صفحه علاقه مندی حذف گردید.']);
    }

    public function unFavoriteWishlist(Product $product)
    {
        \Auth::user()->favorites()->detach($product->id);
         alert()->success('محصول با موفقیت از لیست ارزوها حذف گردید.');
         return back();
    }
}
