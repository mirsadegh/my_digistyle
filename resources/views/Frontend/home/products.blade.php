@extends('Frontend.master')


@section('content')

        @foreach ($products as $product)
             <div class="product-thumb1 card">
                        <div class="image card-img-top">
                            <a href="{{route('singleProduct',$product->id)}}">
                                <img src="{{ $product->image }}" alt="{{ $product->name  }}" title="{{ $product->name }}" class="img-responsive" style="width: 200px;height:330px" />
                            </a>
                        </div>

                    <div class="card-body">
                        <div class="caption">
                            <h4 class="card-title"><a href="{{route('singleProduct',$product->id)}}">{{ $product->name }}</a></h4>
                            <p class="price">
                                @if($product->discount_percent)
                                    <span class="price-new">{{ $product->price - ($product->price * $product->discount_percent/100) }} تومان</span>
                                    <span class="price-old">{{ $product->price }} تومان</span>
                                    <span class="saving">-{{ $product->discount_percent }}%</span>
                                @else
                                    <span class="price-new">{{ $product->price }} تومان</span>
                                @endif
                            </p>
                            <div class="rating">
                                <span class="fa fa-stack">
                                    <i class="fa fa-star fa-stack-2x"></i>
                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                </span>
                                <span class="fa fa-stack">
                                    <i class="fa fa-star fa-stack-2x"></i>
                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                </span>
                                <span class="fa fa-stack">
                                    <i class="fa fa-star fa-stack-2x"></i>
                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                </span>
                                <span class="fa fa-stack">
                                    <i class="fa fa-star fa-stack-2x"></i>
                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                </span>
                                <span class="fa fa-stack">
                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                </span>
                            </div>
                        </div>

                        <div class="button-group">
                            <button class="btn-primary" type="button" onClick="cart.add('49');">
                                <span>افزودن به سبد</span>
                            </button>
                            <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick="">
                                    <i class="fa fa-heart"></i>
                                </button>
                                <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick="">
                                    <i class="fa fa-exchange"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    </div>

        @endforeach
@endsection
