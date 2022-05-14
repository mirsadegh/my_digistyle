@extends('Frontend.master')
@section('script-vue')
    <script>
        $('#sendComment').on('show.bs.modal',function (event){
          let button = $(event.relatedTarget) //button that triggered the modal
          let parent_id = button.data('id')
          let modal = $(this)
          modal.find('input[name="parent_id"]').val(parent_id)
        })
    </script>

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

@endsection
@section('content')


<!-- Modal -->
<div class="modal fade" id="ModalRate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="{{ route('add.rate') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> امتیاز به  محصول {{ $product->name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="rating-css">
                    <div class="star-icon">
                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                        <label for="rating1" class="fa fa-star"></label>
                        <input type="radio" value="2" name="product_rating" id="rating2">
                        <label for="rating2" class="fa fa-star"></label>
                        <input type="radio" value="3" name="product_rating" id="rating3">
                        <label for="rating3" class="fa fa-star"></label>
                        <input type="radio" value="4" name="product_rating" id="rating4">
                        <label for="rating4" class="fa fa-star"></label>
                        <input type="radio" value="5" name="product_rating" id="rating5">
                        <label for="rating5" class="fa fa-star"></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </form>
      </div>
    </div>
  </div>


    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="#"><span><i class="fa fa-home"></i></span></a></li>


        <li><span>{{ $product->category->name }}</span></li>

    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="">
            <div>
                <h1 class="title">{{ $product->name }}</h1>
                <div class="row product-info">
                    <div class="col-sm-6">
                        <div class="image">
                            <div style="height:410px;width:350px;" class="zoomWrapper">
                                <img class="img-responsive" id="zoom_01" src="{{ $product->image }}" style="position: absolute;width:220px;height:330px">
                            </div>
                        </div>
                        <div class="center-block text-center">
                            <span class="zoom-gallery"><i class="fa fa-search"></i></span>
                            <span> برای مشاهده گالری روی تصویر کلیک کنید</span>
                        </div>
                        <div class="image-additional" id="gallery_01">



                            @foreach ($product->gallery->take(4) as $gallery)
                                <a class="thumbnail" href="{{ route('product.gallery',$product->id) }}" title="{{ $product->name }}">
                                    <img src="{{ $gallery->image }}" title="{{ $product->name }}" alt="{{ $product->name }}" width="100">
                                </a>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-unstyled description">
                            <li><b>برند :</b> <a href="#"><span itemprop="brand">{{ $product->brand->persian_name }}</span></a></li>
                            <li><b>کد محصول :</b> <span>{{ $product->id }}</span></li>

                            <li><b>وضعیت موجودی :</b>
                                @if($product->inventory >0)
                                  <span class="instock">موجود</span>
                                @else
                                    <span class="bnt-error">اتمام موجودی</span>
                                @endif
                            </li>
                        </ul>
                        <ul class="price-box">
                            <li class="price">
                                @if($product->discount_percent)
                                    <span class="price-new">{{ $product->price - ($product->price * $product->discount_percent/100) }} تومان</span>
                                    <span class="price-old">{{ $product->price }} تومان</span>
                               @else
                                    <span class="price-new">{{ $product->price }} تومان</span>
                                @endif
                            </li>

                        </ul>
                        <div id="product">
                            {{-- <h3 class="subtitle">انتخاب های در دسترس</h3>
                            <div class="form-group required">
                                <label class="control-label">رنگ</label>
                                <select class="form-control" id="input-option200" name="option[200]">
                                    <option value=""> --- لطفا انتخاب کنید ---</option>
                                    <option value="4">مشکی</option>
                                    <option value="3">نقره ای</option>
                                    <option value="1">سبز</option>
                                    <option value="2">آبی</option>
                                </select>
                            </div> --}}
                            <div class="cart">
                                <div>
                                        <form action="{{ route('cart.add',$product->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-lg">افزودن به سبد</button>
                                        </form>
                                </div>
                                <div class="d-flex mr-5">
                                    @if(Auth::check())
                                       @if (isset($rated))
                                             <p class="ml-3">امتیاز شما به این محصول:</p>
                                              <div class="ml-3">
                                               @for ($i=1;$i<=$rated;$i++)
                                                    <div class="rating ml-1">
                                                        <span class="fa fa-stack">
                                                            <i class="fa fa-star fa-stack-2x"></i>
                                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                                        </span>
                                                    </div>
                                               @endfor
                                               @for ($i=$rated;$i<5;$i++)
                                                    <div class="rating ml-1">
                                                        <span class="fa fa-stack">
                                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                                        </span>
                                                    </div>
                                               @endfor
                                              </div>
                                       @else
                                       <button type="button" class="btn btn-warning ml-3" data-toggle="modal" data-target="#ModalRate">
                                           <i class="fa fa-star"></i>
                                           امتیاز به این محصول
                                       </button>
                                    @endif
                                    @if(! $product->favorited())
                                        <a href="#" id="{{ $product->id }}" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick="event.preventDefault();changeFavorite({{ $product->id }})" style="margin-top: 5px">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    @else
                                        <a href="#" id="{{ $product->id }}" data-toggle="tooltip" title="حذف از علاقه مندی ها" onClick="event.preventDefault();changeUnFavorite({{ $product->id }})" style="margin-top: 5px">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    @endif
                                @endif
                                    <br>
                                    <button type="button" class="wishlist">
                                        <i class="fa fa-exchange"></i>
                                        <span>مقایسه این محصول</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-description" data-toggle="tab" aria-expanded="true">توضیحات</a></li>
                    <li class=""><a href="#tab-specification" data-toggle="tab" aria-expanded="false">مشخصات</a></li>
                    <li class=""><a href="#tab-review" data-toggle="tab" aria-expanded="false">بررسی (2)</a></li>
                </ul>
                <div class="tab-content">
                    <div itemprop="description" id="tab-description" class="tab-pane active">
                        <div>
                           @if($product->category)
                                    <a href="#">{{ $product->category->name }}</a>
                           @endif
                            <p> {!! $product->description !!} </p>
                        </div>
                    </div>
                    <div id="tab-specification" class="tab-pane">
                        <div id="tab-specification" class="tab-pane">

                            <ul style="list-style: none">
                                  @foreach($product->attributes as $attr)
                                    <li class="c-product__specs-table-item">
                                        <div class="c-product__specs-table-item-title"> {{ $attr->name }} :</div>
                                        <div class="c-product__specs-table-item-values">{{ $attr->pivot->value->value }}</div>
                                    </li>
                                    @endforeach
                            </ul>

                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="sendComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">ارسال نظر</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form action="{{ route('send.comment')}}" method="POST">
                                @csrf
                                <div class="modal-body">

                                <input type="hidden" name="commentable_id" value="{{ $product->id }}">
                                <input type="hidden" name="commentable_type" value="{{ get_class($product) }}">
                                <input type="hidden" name="parent_id" value="0">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">پیام دیدگاه:</label>
                                        <textarea name="comment" id="message-text" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                                <button type="submit" class="btn btn-primary">ارسال نظر</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div id="tab-review" class="tab-pane" style="margin-bottom: 45px">
                        <div id="review">
                            <div>
                               @include('Frontend.layouts.comments',['comments' => $product->comments()->latest()->where('approved',1)->where('parent_id',0)->get() ])
                            </div>
                        </div>
                        @auth
                            <h2>یک بررسی بنویسید</h2>
                            <form action="{{ route('send.comment') }}" class="form-horizontal" method="post">
                                @csrf
                                <input type="hidden" name="commentable_id" value="{{ $product->id }}">
                                <input type="hidden" name="commentable_type" value="{{ get_class($product)  }}">
                                <input type="hidden" name="parent_id" value="0">
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label for="input-review" class="control-label">بررسی شما</label>
                                        <textarea class="form-control" id="input-review" rows="5" name="comment"></textarea>
                                        <div class="help-block">
                                            <span class="text-danger">توجه :</span> HTML بازگردانی نخواهد شد!
                                        </div>

                                    </div>
                                </div>
                                <div class="buttons">
                                    <div class="pull-left">
                                        <button class="btn btn-success"  id="button-review" type="submit" style="margin-bottom: 25px" >ثبت بررسی</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <p><b>برای ثبت بررسی باید وارد سایت شوید.</b></p>
                            <a class="btn btn-success" href="{{ route('login') }}">صفحه لاگین</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Middle Part End -->

@endsection


