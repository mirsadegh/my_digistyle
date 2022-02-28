@extends('Frontend.master')
@section('content')
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-xs-12">
                    <!-- Slideshow Start-->
                        @include('Frontend.layouts.slideshow')
                    <!-- Slideshow End-->
                    <!-- Banner Start-->
                    <div class="marketshop-banner">

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="/image/banner/sample-banner-3-300X300.jpg" alt="بنر نمونه 2" title="بنر نمونه 2" /></a></div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="/image/banner/sample-banner-1-300X300.jpg" alt="بنر نمونه" title="بنر نمونه" /></a></div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="/image/banner/sample-banner-2-300X300.jpg" alt="بنر نمونه 3" title="بنر نمونه 3" /></a></div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="/image/banner/sample-banner-4-300X300.jpg" alt="بنر نمونه 4" title="بنر نمونه 4" /></a></div>
                        </div>
                    </div>
                      
                    <div class="row allProduct">
                         <a href="/products" class="underline"> همه محصولات</a>
                    </div>
                    <!-- Banner End-->
                    <!-- محصولات Tab Start -->
                          
                        @include('Frontend.layouts.tabStart',['products' , $products ])
                    <!-- محصولات Tab Start -->
                    <!-- Banner Start -->
                    <div class="marketshop-banner">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/sample-banner-4-600X250.jpg" alt="2 Block Banner" title="2 Block Banner" /></a></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="image/banner/sample-banner-5-600X250.jpg" alt="2 Block Banner 1" title="2 Block Banner 1" /></a></div>
                        </div>
                    </div>
                    <!-- Banner End -->
                    <!-- دسته ها محصولات Slider Start-->
                              @include('Frontend.layouts.sliderStart')
                    <!-- دسته ها محصولات Slider End-->

                    <!-- دسته ها محصولات Slider Start -->
                             @include('Frontend.layouts.sliderStart2')
                    <!-- دسته ها محصولات Slider End -->

                    <!-- برند Logo Carousel Start-->
                    <div id="carousel" class="owl-carousel nxt">
                        <div class="item text-center"> <a href="#"><img src="image/product/apple_logo-100x100.jpg" alt="پالم" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="سونی" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/apple_logo-100x100.jpg" alt="کنون" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="اپل" class="img-responsive" /></a> </div>
                        <div class="item text-center">
                            <a href="#">
                                <img src="image/productapple_logo-100x100.jpg" alt=اچ تی سی" class="img-responsive" />
                            </a>
                        </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="اچ پی" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/apple_logo-100x100.jpg" alt="brand" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="brand1" class="img-responsive" /></a> </div>
                    </div>
                    <!-- برند Logo Carousel End -->
                </div>

                <!--Middle Part End-->
            </div>
    <!-- Feature Box Start-->
    <div class="container">
        <div class="custom-feature-box row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="feature-box fbox_1">
                    <div class="title">ارسال رایگان</div>
                    <p>برای خرید های بیش از 100 هزار تومان</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="feature-box fbox_2">
                    <div class="title">پس فرستادن رایگان</div>
                    <p>بازگشت کالا تا 24 ساعت پس از خرید</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="feature-box fbox_3">
                    <div class="title">کارت هدیه</div>
                    <p>بهترین هدیه برای عزیزان شما</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="feature-box fbox_4">
                    <div class="title">امتیازات خرید</div>
                    <p>از هر خرید امتیاز کسب کرده و از آن بهره بگیرید</p>
                </div>
            </div>
        </div>
    </div>
@endsection


