<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        $products = Product::query();
        if ($keyword = \request('search')) {
            $products->where('name','LIKE',"%{$keyword}%")->orWhere('description','LIKE',"%{$keyword}%")->get();

        }

        $products = $products->latest()->paginate(12);
        return view('Frontend.home.products',compact('products'));
    }

    public function searchPage()
    {

        $parentCategories = Category::where('parent_id',null)->get();
        return view('Frontend.home.search',compact('parentCategories'));

    }
    public function searchPages(Request $request)
    {


          $products = Product::query();
          $keyword = request('search');
          $category_id = request('category_id');
         if(is_null($category_id ) && $keyword){
            $products =  $products->where('name','LIKE',"%{$keyword}%")->orWhere('description','LIKE',"%{$keyword}%")->get();
         }elseif($category_id && $keyword){
             $category = Category::find($category_id);

             if($category->level == 1){
                 $childs_cats = $category->childs;
                 foreach ($childs_cats as $child_cat){
                    $childCats = $child_cat->childs;
                    foreach ($childCats as $childCat){
                        $products = $childCat->products;
                        $products = $products->where('name','LIKE',"%{$keyword}%")->orWhere('description','LIKE',"%{$keyword}%")->get();
                    }
                 }
             }elseif($category->level == 2){
                $childs_cats = $category->childs;
                foreach($childs_cats as $child_cat){
                    $products = $child_cat->products;
                    $products = $products->where('name','LIKE',"%{$keyword}%")->orWhere('description','LIKE',"%{$keyword}%")->get();
                }

             }elseif($category->level == 3){
                  $products = $category->products;
                  $products = $products->where('name','LIKE',"%{$keyword}%")->orWhere('description','LIKE',"%{$keyword}%")->get();
             }
         }

        $parentCategories = Category::where('parent_id',null)->get();
        return view('Frontend.home.search',compact('parentCategories','products'));

    }

    public function sortSearch(Request $request)
    {
        dd($request->all());
    }
}
