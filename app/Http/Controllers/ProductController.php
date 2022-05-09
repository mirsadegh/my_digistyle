<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
         $products = Product::latest()->paginate(12);
         return view('Frontend.home.products',compact('products'));
    }

    public function single(Product $product)
    {
        $product->view_count += 1;
        $product->save();

           $repeatRate = Rating::where('user_id',\Auth::id())->where('product_id',$product->id)->first();

         if ($repeatRate) {
             $rated = $repeatRate->stars_rated ?? '';
             return view('Frontend.home.single-product',compact('product','rated'));
         }
         return view('Frontend.home.single-product',compact('product'));

    }


}
