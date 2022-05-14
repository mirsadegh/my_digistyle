@extends('Frontend.master')
@section('content')

  <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="#">حساب کاربری</a></li>
        <li><a href="wishlist.html">لیست علاقه مندی من</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">لیست آرزوی من</h1>



          @if ($products->count() == 0)
            <h3>محصولی در لیست علاقه‌مندی‌های شما موجود نمی باشد</h3>
           @else

          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-center">تصویر</td>
                  <td class="text-left">نام محصول</td>

                  <td class="text-right">موجودی</td>
                  <td class="text-right">قیمت واحد</td>
                  <td class="text-right">عملیات</td>
                </tr>
              </thead>
              <tbody>

              @foreach ($products as $product)
                <tr>
                  <td class="text-center">
                      <a href="{{ route('singleProduct',$product->id) }}">
                          <img src="{{ $product->image }}" alt="{{ $product->name }}" title="{{ $product->name }}" width="50">
                     </a>
                   </td>
                  <td class="text-left"><a href="{{ route('singleProduct',$product->id) }}">{{ $product->name }}</a></td>

                  <td class="text-right">{{ $product->inventory ? 'موجود' : 'ناموجود'}}</td>
                  <td class="text-right"><div class="price"> {{ number_format($product->price)  }} تومان </div></td>
                  <td class="text-right">

                    <form action="{{ route('cart.add',$product->id) }}" method="post">
                        @csrf
                         <button class="btn btn-primary" title="" data-toggle="tooltip"  type="submit" data-original-title="افزودن به سبد">
                           <i class="fa fa-shopping-cart"></i>
                         </button>
                    </form>

                    <a class="btn btn-danger" title="" data-toggle="tooltip" href="{{ route('unFavoriteWishlist',$product->id) }}" data-original-title="حذف">
                         <i class="fa fa-times"></i>
                    </a>
                </td>
                </tr>
              @endforeach


              </tbody>
            </table>
          </div>

          @endif
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>


@endsection

