<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Auth;
use Illuminate\Http\Request;

class RatingController extends Controller
{
     public function add(Request $request)
     {
        $repeatRate = Rating::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();
        if($repeatRate){
            return back()->withErrors('شما قبلا به این محصول امتیاز داده اید');
        }
         Rating::create([
             'user_id'    => Auth::id(),
             'product_id' => $request->product_id,
             'stars_rated' => $request->product_rating,
         ]);
         alert()->success('امتیاز شما به محصول با موفقیت ثبت گردید');
         return back();
     }
}
