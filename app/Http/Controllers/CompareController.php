<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\Compare\Compare;

class CompareController extends Controller
{



    public function compare()
    {
        
        return view('Frontend.home.compare');
    }

    public function addCompare(Product $product)
    {

        if(Compare::hasNot($product)){
            Compare::put($product);
        }else{
            alert()->error('محصول مورد نظر در صفحه مقایسه وجود دارد.');
        }

        return redirect()->route('compare');
    }

    public function deleteCompare(Product $product)
    {
         if(! Compare::hasNot($product)){
             Compare::delete($product);
             return back();
         }
         alert()->error('محصول مورد نظر در صفحه مقایسه وجود ندارد.');
    }


}
