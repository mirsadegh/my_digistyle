@extends('Frontend.master')

@section('css')
<link rel="stylesheet" type="text/css" href="/css/style-compare.css" />
@endsection

@section('content')
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="{{ route('compare') }}">مقایسه محصولات</a></li>
      </ul>
      <!-- Breadcrumb End-->

      <section class="cd-products-comparison-table">
		<header>
			<h2>مقایسه محصولات</h2>
		</header>


     
        @if (session()->get('compare')== null)
             <h2 style="margin-right: 200px;">صفحه مقایسه شما خالی است!</h2>
        @else
            <div class="cd-products-table">
                <div class="features">
                    <div class="top-info">تصویر</div>
                    <ul class="cd-features-list">
                        <li>قیمت</li>
                        <li>امتیاز مشتریان</li>
                        <li>برند</li>
                        <li>توضیحات محصول</li>
                        <li>عملیات</li>
                    </ul>
                </div> <!-- .features -->

                <div class="cd-products-wrapper">

                    <ul class="cd-products-columns">

                @foreach (Compare::findProduct() as $product)

                    @php

                        $ratings = $product->ratings;
                        if ($ratings->count() > 0) {
                            $ratingCount = $ratings->count();
                        $stars_rated = 0 ;
                        foreach ($ratings as $rating){
                            $stars = $rating->stars_rated;
                            $stars_rated += $stars;
                        }
                        $avgRatingProduct = ($stars_rated/$ratingCount);
                        }

                    @endphp

                        <li class="product">
                            <div class="top-info">

                                <img src="{{ $product->image }}" alt="product image" width="120">
                                <h3>{{ $product->name }}</h3>
                            </div> <!-- .top-info -->

                            <ul class="cd-features-list">
                                <li>{{ number_format($product->price)  }}</li>
                        <li class="rating">
                                @if ($ratings->count() > 0)

                                <span>{{ round($avgRatingProduct,2) }}</span>
                                <span class="fa fa-stack">
                                    <i class="fa fa-star fa-stack-2x"></i>
                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                </span>
                            @endif
                            </li>
                                <li>{{ $product->brand->persian_name }}</li>
                                <li>{{ (Illuminate\Support\Str::limit($product->description,100))   }}</li>
                                <li>
                                    <form action="{{ route('cart.add',$product->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-block btn-primary">افزودن به سبد</button>
                                    </form>

                                <form action="{{ route('deleteCompare',$product->id) }}" method="post" id="delete-{{ $product->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                    <a class="btn btn-danger btn-block mt-3" href="#" onclick="event.preventDefault();document.getElementById('delete-{{ $product->id }}').submit()">حذف</a>
                                </li>
                            </ul>
                        </li> <!-- .product -->
                @endforeach
                    </ul> <!-- .cd-products-columns -->

                </div> <!-- .cd-products-wrapper -->

                {{-- <ul class="cd-table-navigation">
                    <li><a href="#0" class="prev inactive">Prev</a></li>
                    <li><a href="#0" class="next">Next</a></li>
                </ul> --}}
            </div> <!-- .cd-products-table -->

        @endif
	</section> <!-- .cd-products-comparison-table -->

@endsection




