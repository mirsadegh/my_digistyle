<h3 class="subtitle">البسه - <a class="viewall" href="category.html">نمایش همه</a></h3>
<div class="owl-carousel latest_category_carousel">


    @foreach (App\Models\Product::all() as $product)
        <div class="product-thumb">
            <div class="image">
                <a href="{{ route('singleProduct',$product->id) }}">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" title="{{ $product->name }}"
                        class="img-responsive" width="205" />
                </a>
            </div>
            <div class="caption">
                <h4><a href="{{ route('singleProduct',$product->id) }}">{{ $product->title }}</a></h4>
                @if ($product->discount_percent)
                    <p class="price">
                        <span class="price-new">{{ number_format($product->price - ($product->price * $product->discount_percent) / 100) }} تومان</span>
                        <span class="price-old">{{ number_format($product->price) }} تومان</span>
                        <span class="saving">-{{ $product->discount_percent }}%</span>
                    </p>
                @else
                    <p class="price"> {{ number_format($product->price) }} تومان </p>
                @endif
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

            </div>
            <div class="button-group">
                <form action="{{ route('cart.add', $product->id) }}" method="post">
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
                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i
                            class="fa fa-exchange"></i></button>
                </div>
            </div>
        </div>
    @endforeach


</div>


<script type="text/javascript">

    function changeFavorite(id){
           console.log(id);
          var url = /favorite/+id;
          $.ajax({
              url: url,
              type: "GET",
              success:function (response){
                  if (response.status) {
                      console.log(response.status);
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
