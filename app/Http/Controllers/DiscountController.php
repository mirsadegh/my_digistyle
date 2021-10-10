<?php

namespace App\Http\Controllers;

use App\Helpers\Cart\Cart;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function check(Request $request)
    {
        $validated = $request->validate([
            'discount' => 'required|exists:discounts,code',
        ]);

        if (! auth()->check()){
            return back()->withErrors([
               'discount'  => 'برای اعمال کد تخفیف لطفا ابتدا وارد سایت شوید'
            ]);
        }
        $discount = Discount::where('code',$validated['discount'])->first();

        if ($discount->expired_at < now()){
            return back()->withErrors([
                'discount' => 'مهلت استفاده از این کد تخفیف به اتمام رسیده است'
            ]);
        }

         if($discount->users()->count()){
             if (! in_array(auth()->user()->id , $discount->users->pluck('id')->toArray())){
                 return back()->withErrors([
                     'discount' => 'شما قادر به استفاده از این کد تخفیف نیستید'
                 ]);
             }
         }

         Cart::addDiscount($discount->code);

        return back();
    }

    public function destroy(Request $request)
    {
        Cart::addDiscount(null);

        return back();
    }
}
