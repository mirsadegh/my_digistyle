@extends('Frontend.master')

@section('content')
    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="{{ route('index') }}"><i class="fa fa-home"></i></a></li>
        <li>جستجو</li>
    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h1 class="title">جستجو - {{ request('search') }}</h1>
            <label>شاخص جستجو</label>
            <div class="row">

                <form method="post">
                    @csrf
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="جستجو..." name="search">
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control" name="category_id">
                            <option value="">همه دسته ها</option>

                            @foreach ($parentCategories as $parentCategory)
                                <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }}
                                    @if ($parentCategory->childs->count())
                                        @foreach ($parentCategory->childs as $category)
                                <option value="{{ $category->id }}">--{{ $category->name }}
                                    @if ($category->childs->count())
                                        @foreach ($category->childs as $sub_cat)
                                <option value="{{ $sub_cat->id }}">----{{ $sub_cat->name }}</option>
                            @endforeach
                            @endif
                            </option>
                            @endforeach
                            @endif
                            </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary" id="button-search"> جستجو</button>
                    </div>

                </form>

            </div>
            <br>
            <div class="product-filter">
                <div class="row">
                    <div class="col-md-4 col-sm-5">
                        <div class="btn-group">
                            <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip"
                                title="List"><i class="fa fa-th-list"></i></button>
                            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip"
                                title="Grid"><i class="fa fa-th"></i></button>
                        </div>

                    </div>
                    {{-- <div class="col-sm-2 text-right">
                        <label class="control-label" for="input-sort">مرتب سازی :</label>
                    </div>
                    <div class="col-md-3 col-sm-2 text-right">
                        <select id="input-sort" class="form-control col-sm-6" name="orders">
                            <option value="" selected>پیشفرض</option>
                            <option value="1">قیمت (کم به زیاد)</option>
                            <option value="2">قیمت (زیاد به کم)</option>
                            <option value="3">امتیاز (بیشترین)</option>
                            <option value="4">امتیاز (کمترین)</option>
                        </select>
                    </div> --}}
                    {{-- <div class="col-sm-1 text-right">
                        <label class="control-label" for="input-limit">نمایش :</label>
                    </div>
                    <div class="col-sm-2 text-right">
                        <select id="input-limit" class="form-control">
                            <option value="" selected="selected">20</option>
                            <option value="">25</option>
                            <option value="">50</option>
                            <option value="">75</option>
                            <option value="">100</option>
                        </select>
                    </div> --}}
                </div>
            </div>
            <br />
            <div class="row products-category">

                @if (isset($products))
                  @foreach ($products as $product)
                   <div class="product-layout product-list col-xs-12">
                                    <div class="product-thumb">
                                        <div class="image">
                                            <a href="{{ route('singleProduct',$product->id) }}}}">
                                                <img src="{{ $product->image }}"  title="{{ $product->name }}" class="img-responsive" width="180" />
                                            </a>
                                        </div>
                                        <div class="caption">
                                            <h4><a href="{{ route('singleProduct',$product->id) }}">{{ $product->name }}</a></h4>
                                            @if($product->discount_percent)
                                            <p class="price">
                                                 <span class="price-new">{{ number_format($product->price - ( $product->price * $product->discount_percent/100)) }} تومان</span>
                                                 <span class="price-old">{{ number_format($product->price)  }} تومان</span>
                                                 <span class="saving">-{{ $product->discount_percent }}%</span>
                                              </p>
                                          @else
                                            <p class="price"> {{ number_format($product->price)  }} تومان </p>
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
                    </div>
                  @endforeach

                @endif

            </div>

        </div>
        <!--Middle Part End -->
    </div>
    </div>
    </div>
@endsection

@section('script-vue')
<script type="text/javascript">

     $("#input-sort").change(function(){
         var select_sort = $(this).val();

         $.ajaxSetup({
             headers:{
                 "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content,
                 "Content-Type": "application/json"
             }
         })

         $.ajax({
             type: 'POST',
             url: '/searchPage',
             data: JSON.stringify({
                 orders : select_sort
             }),


         })
     })



    function changeFavorite(id){

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

@endsection

