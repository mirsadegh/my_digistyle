@extends('Frontend.master')

@section('script-vue')
    <script>
              function changeQuantity(event , id ) {
                  $.ajaxSetup({
                      headers:{
                          "X-CSRF-TOKEN" : document.head.querySelector('meta[name="csrf-token"]').content,
                          "Content-Type" : "application/json"
                      }
                  })

                  $.ajax({
                      type: 'POST',
                      url: '/cart/quantity/change',
                      data : JSON.stringify({
                          id: id ,
                          quantity : event.target.value,
                          _method : 'patch'
                      }),
                      success: function ($res){
                          console.log($res)
                          location.reload()
                      },
                      error: function ($error){
                          console.log($error)
                      }
                  })
              }

    </script>

@endsection
@section('content')

    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><a href="#">سبد خرید</a></li>
            </ul>

            <!-- Breadcrumb End-->
            @if(Cart::all()->count())
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">سبد خرید</h1>

                    <div class="table-responsive">
                        <table class="table  text-center" >
                            <thead>
                            <tr>
                                <td>تصویر</td>
                                <td>نام محصول</td>
                                <td>تعداد</td>
                                <td>قیمت واحد</td>
                                <td>کل</td>
                            </tr>
                            </thead>
                            <tbody>

                               @foreach(Cart::all() as $cart)
                                    @php
                                       $product = $cart['product'];
                                    @endphp
                                 <tr>
                                    <td>
                                        <a href="{{ route('singleProduct',$product->id) }}">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-thumbnail" width="50" height="100">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('singleProduct',$product->id) }}" class="line-height-50">{{ $product->name }}</a><br>
                                    </td>
                                    <td>
                                            <select onchange="changeQuantity(event,'{{ $cart['id'] }}')" class="align-middle text-center">
                                                 @foreach(range(1,$product->inventory) as $item)
                                                     <option value="{{ $item }}" {{ $cart['quantity'] == $item ? 'selected' : '' }}>{{ $item }}</option>
                                                 @endforeach
                                            </select>
                                    </td>

                                     @if(! $product->discount_percent)
                                         <td><span class="line-height-50">{{ number_format($product->price)  }} تومان </span></td>
                                     @else
                                         <td>
                                             <span class="line-height-50">
                                                 <del class="text-danger text-sm">{{ number_format($product->price)  }}  تومان </del>
                                                 <span>{{ number_format($product->price - ( $product->price * $product->discount_percent/100)) }}   تومان  </span>
                                             </span>
                                         </td>
                                     @endif


                                     @if(! $product->discount_percent)
                                         <td><span class="line-height-50">{{ number_format($product->price * $cart['quantity']) }} تومان </span></td>
                                     @else
                                         <td>
                                             <span class="line-height-50">
                                                 <del class="text-danger text-sm">{{ number_format($product->price * $cart['quantity']) }}  تومان </del>
                                                 <span>{{  number_format(($product->price - ( $product->price * $product->discount_percent/100) ) * $cart['quantity'])  }} تومان </span>
                                             </span>
                                         </td>
                                     @endif
                                     <td>
                                         <form action="{{ route('cart.destroy',$cart['id']) }}" method="post" id="delete-product-{{ $product->id }}">
                                             @csrf
                                             @method('DELETE')
                                         </form>
                                         <a href="#" onclick="event.preventDefault();document.getElementById('delete-product-{{ $product->id }}').submit()" class="line-height-50"><i class="fa fa-close"></i></a>
                                     </td>
                                </tr>
                               @endforeach

                            </tbody>
                        </table>
                    </div>

                    <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>
                    @if($discount = Cart::getDiscount())
                       <div class="mt-4 row">
                           <form action="/discount/delete" method="post" id="delete-discount">
                               @csrf
                               @method('delete')

                           </form>

                           <div class="col-sm-6">
                               <div>
                                    <span>   کد تخفیف فعال :</span>
                                   <span class="text-success">{{ $discount->code }}</span>
                                   <a href="#" class="badge badge-danger mr-2" onclick="event.preventDefault();document.getElementById('delete-discount').submit()" >حذف</a>
                               </div>
                               <div>
                                   درصد تخفیف :
                                   <span class="text-success">{{ $discount->percent }} درصد </span>
                               </div>
                           </div>
                       </div>
                    @else
                        <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                                    </div>
                                    <div id="collapse-coupon" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <label class="col-sm-5 control-label" for="input-coupon">کد تخفیف خود را در اینجا وارد کنید</label>
                                            <form action="{{ route('cart.discount.check') }}" method="post" >
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" name="discount" placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon" class="form-control">
                                                    <span class="mt-3" style="margin-right: 44rem">
                                                    <button type="submit"  id="button-coupon" class="btn btn-primary">اعمال تخفیف</button>
                                                </span>
                                                </div>
                                            </form>
                                            @if($errors->has('discount'))
                                                <div class="text-danger text-sm mt-2">{{ $errors->first('discount') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                    @php
                     $totalPrice = Cart::all()->sum(function ($cart){
                           return $cart['product']->price * $cart['quantity'];
                      });

                      $discount = Cart::all()->sum(function ($cart){
                          return ($cart['product']->price * ($cart['product']->discount_percent / 100) )*$cart['quantity'];
                      });
                     if (isset(Cart::getDiscount()->percent)){
                          $discountper = Cart::getDiscount()->percent/100;
                          $codeDiscount = ($totalPrice - $discount) * $discountper;
                     }

                   if (isset($codeDiscount)){
                       $total = $totalPrice - $discount - $codeDiscount;
                   }else{
                       $total = $totalPrice - $discount ;
                   }
                    @endphp
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="text-right"><strong>جمع کل:</strong></td>
                                    <td class="text-right">{{ number_format($totalPrice) }} تومان</td>
                                </tr>
                                @if($discount)
                                <tr>
                                    <td class="text-right"><strong>تخفیف (محصولات):</strong></td>
                                   <td class="text-right">{{ number_format($discount) }} تومان</td>
                                </tr>
                                @endif
                                @if(isset($codeDiscount))
                                <tr>
                                    <td class="text-right"><strong>تخفیف (کد تخفیف):</strong></td>
                                   <td class="text-right">{{ number_format($codeDiscount)  }} تومان</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="text-right"><strong>مبلغ قابل پرداخت :</strong></td>
                                    <td class="text-right">{{ number_format($total)   }} تومان </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="buttons">
                        <form action="{{ route('cart.payment') }}" method="post" id="cart-payment">
                            @csrf
                        </form>
                        <div class="pull-left">
                            <a href="#" onclick="event.preventDefault();document.getElementById('cart-payment').submit()" class="btn btn-default">ادامه خرید</a>
                        </div>
                </div>
                <!--Middle Part End -->
            </div>
            @else
              <div class="c-checkout__headline"><div class="c-checkout__headline-title">سبد خرید شما</div></div>
               <div class="c-checkout-product__list-empty">
                   <div class="c-checkout-product__empty-symbol"></div>
                   <div class="c-checkout-product__empty-title">سبد خرید شما خالی است.</div>
               </div>

            @endif
        </div>
    </div>
@endsection
