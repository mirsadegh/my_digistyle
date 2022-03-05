<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showProductsCategory(Category $category ,$childCategory = null , $childCategory2 = null)
    {
        $products = null;
        $ids = collect();
        $selectedCategories = [];
        $childCategory = Category::where('slug',$childCategory)->first();
        if ($childCategory2) {
              $subCategory =  $childCategory->childs()->where('slug', $childCategory2)->firstOrFail();
              $ids = collect($subCategory->id);
              $selectedCategories = [ $category->id , $childCategory->id , $subCategory->id ];
        } elseif($childCategory) {
              $ids = collect($childCategory->id);
              $ids = $ids->merge($childCategory->childs()->pluck('id'));
              $selectedCategories = [$category->id , $childCategory->id];
        } elseif($category){
             $ids = collect($category->id);
             $ids = $ids->merge($category->childs->pluck('id'));
             foreach ($category->childs as  $subCategory) {
                  $ids = $ids->merge($subCategory->childs->pluck('id'));
             }
             $selectedCategories[] = $category->id;
        }
        $products = Product::whereHas('category',function ($query) use($ids) {
              $query->whereIn('id',$ids);
        })->get();
        return view('Frontend.home.products',compact('products'));
    }


}
