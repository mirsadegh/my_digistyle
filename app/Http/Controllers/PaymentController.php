<?php

namespace App\Http\Controllers;

use App\Helpers\Cart\Cart;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class PaymentController extends Controller
{
    public function payment()
    {
        $cartItems = Cart::all();
        if ($cartItems->count()){

            $totalPrice = $cartItems->sum(function ($cart){
                return $cart['product']->price * $cart['quantity'];
            });

            $discount = $cartItems->sum(function ($cart){
                return ($cart['product']->price * ($cart['product']->discount_percent / 100) )*$cart['quantity'];
            });
            $getdiscount = Cart::getDiscount() ;
            if (isset($getdiscount->percent)){
                $discountper = $getdiscount->percent/100;
                $codeDiscount = ($totalPrice - $discount) * $discountper;
            }

            if (isset($codeDiscount)){
                $price = $totalPrice - $discount - $codeDiscount;
            }else{
                $price = $totalPrice - $discount ;
            }

            $order = auth()->user()->orders()->create([
                   'status' => 'unpaid',
                   'price' => $price,
            ]);

            $orderItems = $cartItems->mapWithKeys(function ($cart) {
                if($cart['product']->discount_percent){
                    $price = $cart['product']->price - ( $cart['product']->price * ($cart['product']->discount_percent)/ 100 );

                 }else{
                     $price = $cart['product']->price;
                 }
                return [$cart['product']->id =>
              ['quantity' => $cart['quantity'],'price' => $price ]
            ];
            });
            $order->products()->attach($orderItems);

            $token = config('services.payping.token');
            $res_number = Str::random();
            $args = [
                //  "amount" => $price ,
                "amount" => 100 ,
                "payerName" => auth()->user()->name,
                "returnUrl" => route('payment.callback'),
                "clientRefId" => $res_number
            ];

            $payment = new \PayPing\Payment($token);

            try {
                $payment->pay($args);
            } catch (\Exception $e) {
                throw $e;
            }
            //echo $payment->getPayUrl();
            $order->payments()->create([
                'resnumber' => $res_number,
                'price' => $price
            ]);

             Cart::flush();

            return redirect($payment->getPayUrl());
        }
        return back();
    }


    public function callback(Request $request)
    {

        $payment = Payment::where('resnumber', $request->clientrefid)->firstOrFail();

        $token = config('services.payping.token');

        $payping = new \PayPing\Payment($token);

        try {
            // $payment->price
            if($payping->verify($request->refid, 100)){
                $payment->update([
                    'status' => 1
                ]);

                $payment->order()->update([
                    'status' => 'paid'
                ]);

                alert()->success('پرداخت شما موفق بود','ok');
                return redirect('/products');
            }else{
                alert()->error('پرداخت شما تایید نشد');
                return redirect('/products');
            }
        } catch (\Exception $e) {
            $errors = collect(json_decode($e->getMessage() , true));

            alert()->error($errors->first());
            return redirect('/products');
        }
    }




//    public function payment()
//    {
//        $cartItems = Cart::all();
//
//
//        if ($cartItems->count()) {
//            $totalPrice = $cartItems->sum(function ($cart) {
//                return $cart['product']->price * $cart['quantity'];
//            });
//
//            $discount = $cartItems->sum(function ($cart) {
//                return ($cart['product']->price * ($cart['product']->discount_percent / 100)) * $cart['quantity'];
//            });
//            $getdiscount = Cart::getDiscount();
//
//            if (isset($getdiscount->percent)) {
//                $discountper = $getdiscount->percent / 100;
//                $codeDiscountPrice = ($totalPrice - $discount) * $discountper;
//            }
//            if (isset($codeDiscountPrice)) {
//                $price = $totalPrice - $discount - $codeDiscountPrice;
//            } else {
//                $price = $totalPrice - $discount;
//            }
//
//             $codeDiscountPrice = $codeDiscountPrice ?? null;
//             $discountpers = $getdiscount->percent  ?? null ;
//             $code = $getdiscount->code ?? null;
//
//            $order = auth()->user()->orders()->create([
//                'status' => 'unpaid',
//                'price' => $price,
//                'discountPrice' => $codeDiscountPrice,
//                'discountPercent' => $discountpers,
//                'discountCode' => $code
//            ]);
//
//
//            $orderItems = $cartItems->mapWithKeys(function ($cart) {
//                if($cart['product']->discount_percent){
//                    $price = $cart['product']->price - ( $cart['product']->price * ($cart['product']->discount_percent)/ 100 );
//
//                 }else{
//                     $price = $cart['product']->price;
//                 }
//                return [$cart['product']->id =>
//              ['quantity' => $cart['quantity'],'price' => $price ]
//            ];
//            });
//
//            $order->products()->attach($orderItems);
//
//            // Create new invoice.
//            $invoice = (new Invoice)->amount(100);
//
//            return ShetabitPayment::callbackUrl(route('payment.callback'))->purchase($invoice, function ($driver, $transactionId) use($order, $price , $invoice) {
//                $order->payments()->create([
//                    'resnumber' => $invoice->getUuid(),
//                    'price' => $price
//                ]);
//                Cart::flush();
//            })->pay()->render();
//
//        }
//
//        return back();
//    }
//
//
//
//    public function callback(Request $request)
//    {
//        try {
//            $payment = Payment::where('resnumber', $request->clientrefid)->firstOrFail();
//            $receipt = ShetabitPayment::amount(100)->transactionId($request->clientrefid)->verify();
//
//            $payment->update([
//                'status' => 1
//            ]);
//
//            $payment->order()->update([
//                'status' => 'paid'
//            ]);
//
//            alert()->success('پرداخت شما موفق بود','ok');
//            return redirect('/products');
//
//        } catch (InvalidPaymentException $exception) {
//            /**
//            when payment is not verified, it will throw an exception.
//            We can catch the exception to handle invalid payments.
//            getMessage method, returns a suitable message that can be used in user interface.
//             **/
//
//            alert()->error($exception->getMessage());
//            return redirect('/products');
//        }
//    }
}
