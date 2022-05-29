<div id="product-tab" class="product-tab">
    <ul id="tabs" class="tabs">
        <li><a href="#tab-featured">ویژه</a></li>
        <li><a href="#tab-latest">جدیدترین</a></li>
        <li><a href="#tab-bestseller">پرفروش</a></li>
        {{-- <li><a href="#tab-special">پیشنهادی</a></li> --}}
    </ul>
           @php
               $amazing_sales = App\Models\AmazingSale::where('end_date','>=',Carbon\Carbon::now())->get();
           @endphp
    <div id="tab-featured" class="tab_content">
        <div class="owl-carousel product_carousel_tab">

            @foreach ($amazing_sales as $amazing_sale)
                <div class="product-thumb clearfix">
                    <div class="image">
                        <a href="/products/{{ $amazing_sale->product_id }}">
                            <img src="{{ $amazing_sale->product->image }}"  title="{{ $amazing_sale->product->name }}" class="img-responsive" width="180" />
                        </a>
                    </div>
                    <div class="caption">
                        <h4><a href="{{ route('singleProduct',$amazing_sale->product_id) }}">{{ $amazing_sale->product->name }}</a></h4>
                        <p class="price">
                            <span class="price-new">
                                {{ number_format($amazing_sale->product->price - ($amazing_sale->percentage/100 * $amazing_sale->product->price))  }} تومان

                            </span>
                            <span class="price-old">{{ number_format($amazing_sale->product->price)  }} تومان</span>
                            <span class="saving">-{{ $amazing_sale->percentage }}%</span>
                        </p>

                        @php
                            $product = App\Models\Product::find($amazing_sale->product->id);
                            $ratings = $product->ratings;
                          if ($ratings->count() > 0) {
                               $ratingCount = $ratings->count();
                            $stars_rated = 0 ;
                            foreach ($ratings as $rating){
                                $stars = $rating->stars_rated;
                                $stars_rated += $stars;
                            }
                            $avgRatingProduct = ceil($stars_rated/$ratingCount);
                          }

                        @endphp
                        @if ($ratings->count() > 0)
                            <div class="rating">

                                @for ($i=1;$i<=$avgRatingProduct;$i++)
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star fa-stack-2x"></i>
                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                    </span>
                                @endfor
                                @for ($i>$avgRatingProduct;$i<=5;$i++)
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                    </span>
                                @endfor
                            </div>
                        @endif

                    </div>
                    <div class="button-group">
                        <form action="{{ route('cart.add',$amazing_sale->product->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg">افزودن به سبد</button>
                        </form>
                        <div class="add-to-links">
                        @if(Auth::check())
                            @if(! $amazing_sale->product->favorited())
                                <a href="#" id="{{ $amazing_sale->product_id }}" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick="event.preventDefault();changeFavorite({{ $amazing_sale->product_id }})">
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            @else
                                <a href="#" id="{{ $amazing_sale->product_id }}" data-toggle="tooltip" title="حذف از علاقه مندی ها" onClick="event.preventDefault();changeUnFavorite({{ $amazing_sale->product_id }})">
                                    <i class="fa fa-heart"></i>
                                </a>
                            @endif
                        @endif
                          <form action="{{ route('addCompare',$amazing_sale->product->id) }}" method="post">
                            @csrf
                           <button type="submit" data-toggle="tooltip" title="مقایسه این محصول">
                                <i class="fa fa-exchange"></i>
                            </button>
                          </form>

                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>



    <div id="tab-latest" class="tab_content">
        <div class="owl-carousel product_carousel_tab">

            @foreach($products as $product)
                <div class="product-thumb">
                    <div class="image">
                        <a href="/products/{{ $product->id }}">
                          <img src="{{ $product->image }}" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-responsive" width='205' height="205" />
                        </a>
                    </div>
                    <div class="caption">
                        <h4><a href="/products/{{ $product->id }}">{{ $product->name }}</a></h4>
                         @if($product->discount_percent)
                           <p class="price">
                                <span class="price-new">{{ number_format($product->price - ( $product->price * $product->discount_percent/100)) }} تومان</span>
                                <span class="price-old">{{ number_format($product->price)  }} تومان</span> <span class="saving">-{{ $product->discount_percent }}%</span>
                             </p>
                         @else
                           <p class="price"> {{ number_format($product->price)  }} تومان </p>
                         @endif
                    </div>

                    @php
                        $ratings = $product->ratings;
                        if ($ratings->count() > 0) {

                        $ratingCount = $ratings->count();
                        $stars_rated = 0 ;
                        foreach ($ratings as $rating){
                            $stars = $rating->stars_rated;
                            $stars_rated += $stars;
                         }
                            $avgRatingProduct = ceil($stars_rated/$ratingCount);
                        }
                    @endphp
                   @if ($ratings->count() > 0)
                    <div class="rating">

                        @for ($i=1;$i<=$avgRatingProduct;$i++)
                            <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                        @endfor
                        @for ($i>$avgRatingProduct;$i<=5;$i++)
                            <span class="fa fa-stack">
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                        @endfor
                    </div>
                   @endif
                    <div class="button-group" id="app">
                        <form action="{{ route('cart.add',$product->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg">افزودن به سبد</button>
                        </form>
                        <div class="add-to-links">

                            @if(Auth::check())
                                @if(! $product->favorited())
                                    <a href="#" id="{{ $product->id }}" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick="event.preventDefault();changeFavorite({{ $product->id }})">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                @else
                                    <a href="#" id="{{ $product->id }}" data-toggle="tooltip" title="حذف از علاقه مندی ها" onClick="event.preventDefault();changeUnFavorite({{ $product->id }})">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                @endif
                            @endif

                            <form action="{{ route('addCompare',$product->id) }}" method="post">
                                @csrf
                               <button type="submit" data-toggle="tooltip" title="مقایسه این محصول">
                                    <i class="fa fa-exchange"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

      @php
           $bestsellerProducts = App\Models\Product::whereHas('orders', function($query){
                   $query->where('status','paid');
           })->get();
      @endphp

    <div id="tab-bestseller" class="tab_content">
        <div class="owl-carousel product_carousel_tab">

         @foreach ($bestsellerProducts as $sellerProduct)
           <div class="product-thumb">
                <div class="image">
                    <a href="/products/{{ $sellerProduct->id }}">
                        <img src="{{ $sellerProduct->image }}" alt="{{ $sellerProduct->title }}" title="{{ $sellerProduct->title }}" class="img-responsive" width="180" />
                    </a>
                </div>
                <div class="caption">
                    <h4><a href="/products/{{ $sellerProduct->id }}">{{ $sellerProduct->title }}</a></h4>
                    <p class="price"> {{ $sellerProduct->price }} تومان </p>
                </div>
                @php
                    $ratings = $sellerProduct->ratings;
                    if ($ratings->count() > 0) {

                    $ratingCount = $ratings->count();
                    $stars_rated = 0 ;
                    foreach ($ratings as $rating){
                        $stars = $rating->stars_rated;
                        $stars_rated += $stars;
                    }
                        $avgRatingProduct = ceil($stars_rated/$ratingCount);
                    }
                @endphp

                  @if ($ratings->count() > 0)
                    <div class="rating">
                        @for ($i=1;$i<=$avgRatingProduct;$i++)
                            <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                        @endfor
                        @for ($i>$avgRatingProduct;$i<=5;$i++)
                            <span class="fa fa-stack">
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                        @endfor
                    </div>
                @endif

                <div class="button-group">
                    <button class="btn-primary" type="button"><span>افزودن به سبد</span></button>
                    <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                    </div>
                </div>
            </div>
         @endforeach


        </div>
    </div>
</div>


