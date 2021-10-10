@extends('Frontend.master')


@section('content')
    <h1>جزییات سفارشات</h1>
<table class="table">
    <tbody>
    <tr class="text-center">
        <th>آیدی محصول</th>
        <th>عنوان محصول</th>
        <th>تعداد سفارش</th>
        <th>قیمت محصول</th>
    </tr>

    @foreach($order->products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{$product->name }}</td>
            <td>{{ $product->pivot->quantity }}</td>
             <td>{{ number_format($product->pivot->price) }} تومان</td> 
       </tr>
    @endforeach

    </tbody>
</table>
   @if ($order->discountCode)
      <hr>
       <div class="form-group" style="color: #676767">
       <div>
           <span> کد تخفیف استفاده شده :</span>
           <span class="text-success">{{ $order->discountCode}}</span>
       </div>
       <div>
           <span>  قیمت کد تخفیف استفاده شده :</span>
           <span class="text-success">{{ number_format($order->discountPrice) }} تومان</span>
       </div>
         <div>
                <span>  درصد کد تخفیف :</span> 
                <span class="text-success">{{ $order->discountPersent }}</span>
            </div>
   </div> 
   @endif
  
  <div class="form-group pull-left ">
      <span><b> قیمت کل سفارش ‌ :</b> </span>
      <span class="badge badge-lg badge-success">{{ number_format($order->price)  }} تومان</span>
  </div>



@endsection



