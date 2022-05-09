<div id="product-tab" class="product-tab">
    <ul id="tabs" class="tabs">
        <li><a href="#tab-featured">ویژه</a></li>
        <li><a href="#tab-latest">جدیدترین</a></li>
        <li><a href="#tab-bestseller">پرفروش</a></li>
        <li><a href="#tab-special">پیشنهادی</a></li>
    </ul>
           @php
               $amazing_sales = App\Models\AmazingSale::all();
           @endphp
    <div id="tab-featured" class="tab_content">
        <div class="owl-carousel product_carousel_tab">

            @foreach ($amazing_sales as $amazing_sale)
            <div class="product-thumb clearfix">
                    <div class="image">
                        <a href="/products/{{ $amazing_sale->product_id }}">
                            <img src="{{ $amazing_sale->product->image }}"  title="{{ $amazing_sale->product->name }}" class="img-responsive" />
                        </a>
                    </div>
                    <div class="caption">
                        <h4><a href="#">{{ $amazing_sale->product->name }}</a></h4>
                        <p class="price">
                            <span class="price-new">
                                {{ number_format($amazing_sale->product->price - ($amazing_sale->percentage/100 * $amazing_sale->product->price))  }} تومان

                            </span>
                            <span class="price-old">{{ number_format($amazing_sale->product->price)  }} تومان</span>
                            <span class="saving">-{{ $amazing_sale->percentage }}%</span>
                        </p>

                        @php
                           $sumRatingsProduct = App\Models\Rating::where('product_id',$amazing_sale->product->id)->sum('stars_rated');
                           $countRating = App\Models\Rating::where('product_id',$amazing_sale->product->id)->count();
                           $avgRatingProduct = $sumRatingsProduct/$countRating;
                           $avgRatingProduct = ceil($avgRatingProduct);

                        @endphp
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

                           {{-- @if(is_int($avgRatingProduct))
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
                          @elseif(is_float($avgRatingProduct))
                            @for ($i=1;$i<=floor($avgRatingProduct);$i++)
                                <span class="fa fa-stack">
                                    <i class="fa fa-star fa-stack-2x"></i>
                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                </span>
                            @endfor
                            @for ($i>ceil($avgRatingProduct);$i<=5;$i++)
                                <span class="fa fa-stack">
                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                </span>
                            @endfor
                          @endif --}}

                        </div>
                    </div>
                    <div class="button-group">
                        <button class="btn-primary" type="button" onClick="cart.add('49');">
                            <span>افزودن به سبد</span>
                        </button>
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
                            <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick="">
                                <i class="fa fa-exchange"></i>
                            </button>
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

                            <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>



    <div id="tab-bestseller" class="tab_content">
        <div class="owl-carousel product_carousel_tab">
            <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="دوربین فاین پیکس" title="دوربین فاین پیکس" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">دوربین فاین پیکس</a></h4>
                    <p class="price"> 122000 تومان </p>
                </div>
                <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                    <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                    </div>
                </div>
            </div>
            <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="image/product/nikon_d300_1-220x330.jpg" alt="دوربین دیجیتال حرفه ای" title="دوربین دیجیتال حرفه ای" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">دوربین دیجیتال حرفه ای</a></h4>
                    <p class="price"> <span class="price-new">92000 تومان</span> <span class="price-old">98000 تومان</span> <span class="saving">-6%</span> </p>
                </div>
                <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                    <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="tab-special" class="tab_content">
        <div class="owl-carousel product_carousel_tab">


           @foreach($products as $product)
            <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="image/product/ipod_touch_1-220x330.jpg" alt="سامسونگ گلکسی s7" title="سامسونگ گلکسی s7" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">سامسونگ گلکسی s7</a></h4>
                    <p class="price"> <span class="price-new">62000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-50%</span> </p>
                </div>
                <div class="button-group">
                    <button class="btn-primary" type="button"><span>افزودن به سبد</span></button>
                    <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>

</div>


<script type="text/javascript">

            function changeFavorite(id){
                  var url = /favorite/+id;
                  $.ajax({
                      url: url,
                      type: "GET",
                      success:function (response){
                          console.log(response.status);
                          if (response.status) {
                             $("#"+id +'>i').removeClass('fa-heart-o').addClass('fa-heart');
                              $("#"+id).attr('title' , response.message);
                          }
                      },

                  })
            }
            function changeUnFavorite(id){

                var url = '/unFavorite/'+ id;

                $.ajax({
                    url: url,
                    type: "GET",
                    success:function (response){

                        console.log(response.status)
                         if(response.status){
                             $("#"+id +'>i').removeClass('fa-heart').addClass('fa-heart-o');
                             $("#"+id).attr('title' , response.message);
                         }
                    },

                })
            }
</script>
