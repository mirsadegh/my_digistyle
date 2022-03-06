<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Product $product)
    {
       $galleries =  $product->gallery;
       return view('Frontend.gallery.index',compact('galleries','product'));
    }
}
