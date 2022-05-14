
<div id="header">
    <!-- Top Bar Start-->
    <nav id="top" class="htop">
        <div class="container">
            <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
                <div class="pull-left flip left-top">
                    <div class="links">
                        <ul>
                            <li class="mobile">
                                <i class="fa fa-phone"></i>
                                <span>9898777656</span>
                                <span>21+ </span>
                            </li>
                            <li class="email"><a href="mailto:info@marketshop.com"><i class="fa fa-envelope"></i>info@marketshop.com</a></li>
                            <li class="wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی<b></b></a>
                                <div class="dropdown-menu custom_block">
                                    <ul>
                                        <li>
                                            <table>
                                                <tbody>
                                                <tr>
                                                    <td><img alt="" src="/image/banner/cms-block.jpg"></td>
                                                    <td><img alt="" src="/image/banner/responsive.jpg"></td>
                                                </tr>
                                                <tr>
                                                    <td><h4>بلاک های محتوا</h4></td>
                                                    <td><h4>قالب واکنش گرا</h4></td>
                                                </tr>
                                                <tr>
                                                    <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                                    <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                                </tr>
                                                <tr>
                                                    <td><strong><a class="btn btn-default btn-sm" href="#">ادامه مطلب</a></strong></td>
                                                    <td><strong><a class="btn btn-default btn-sm" href="#">ادامه مطلب</a></strong></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>


                </div>
                @guest
                    <div id="top-links" class="nav pull-right flip">
                        <ul>
                            <li><a href="{{ route('login') }}">ورود</a></li>
                            <li><a href="{{ route('register') }}">ثبت نام</a></li>
                        </ul>
                    </div>
                @else
                    <div id="top-links" class="nav pull-right flip m-3">
                        <ul>
                            <li>
                               <div class="dropdown show">
                                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <span> {{ auth()->user()->name }}</span>
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">حساب کاربری</a>
                                    <a class="dropdown-item" href="{{ route('profile.orders')}}">سفارش های من</a>
                                    <a class="dropdown-item" href="{{ route('showFavorites') }}">لیست علاقمندی ها</a>
                                    <a class="dropdown-item"  href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()"> خروج از حساب کاربری</a>
                                    <form action="{{ route('logout') }}" method="post" id="logout-form">
                                        @csrf
                                    </form>
                                  </div>
                                </div>

                            </li>
                        </ul>
                    </div>
                @endguest

            </div>
        </div>
    </nav>
    <!-- Top Bar End-->
    <!-- Header Start-->
    <header class="header-row">
        <div class="container">
            <div class="table-container">
                <!-- Logo Start -->
                <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
                    <div id="logo"><a href="index.html"><img class="img-responsive" src="/image/logo.png" title="MarketShop" alt="MarketShop" /></a></div>
                </div>
                <!-- Logo End -->
                <!-- Mini Cart Start-->
                @auth
                <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div id="cart">
                        <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..." class="heading dropdown-toggle">
                            <span class="cart-icon pull-left flip"></span>
                            @php
                              $totalPrice = Cart::all()->sum(function ($cart){
                                       return $cart['product']->price * $cart['quantity'];
                              });
                             $totalQuantity = Cart::all()->sum(function ($cart){
                                    return $cart['quantity'];
                             });

                            $discount = Cart::all()->sum(function ($cart){
                              return ($cart['product']->price * ($cart['product']->discount_percent / 100) )*$cart['quantity'];
                               });

                           if (isset(Cart::getDiscount()->percent)){
                              $discountper = Cart::getDiscount()->percent/100;
                              $codeDiscount = ($totalPrice - $discount) * $discountper;
                              $discount += $codeDiscount;
                           }
                                $total = $totalPrice - $discount ;
                            @endphp
                            @if(Cart::all()->count())
                              <span id="cart-total">{{ $totalQuantity  }} آیتم - {{ $total }} تومان</span>
                             @endif
                        </button>
                          <ul class="dropdown-menu">
                             @if(Cart::all()->count())
                                    @foreach(Cart::all() as $cart)
                                         @php
                                           $product = $cart['product'];
                                         @endphp
                                        <li>
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">
                                                        <a href="{{ route('singleProduct',$product->id) }}">
                                                            <img class="img-thumbnail" title="{{ $product->name }}" alt="{{ $product->name }}" src="{{ $product->image }}" width="50" height="100">
                                                        </a>
                                                    </td>
                                                    <td class="text-left"><a href="{{ route('singleProduct',$product->id) }}">{{ $product->name }}</a></td>
                                                    <td class="text-right">x {{ $cart['quantity'] }}</td>
                                                    <td class="text-right">{{ $product->price }} تومان</td>
                                                    <td class="text-center">
                                                        <form action="{{ route('cart.destroy',$cart['id']) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-xs remove" title="حذف"  type="submit">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </li>

                                   @endforeach
                                        <li>
                                            <div>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-right"><strong>جمع کل</strong></td>
                                                        <td class="text-right">{{ $totalPrice }} تومان </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><strong> تخفیف </strong></td>
                                                        <td class="text-right">{{ $discount }} تومان </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><strong>قابل پرداخت</strong></td>
                                                        <td class="text-right">{{ $total }} تومان </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <p class="checkout">
                                                    <a href="{{ url('/cart') }}" class="btn btn-primary">
                                                        <i class="fa fa-shopping-cart"></i> مشاهده سبد
                                                    </a>&nbsp;&nbsp;
                                                </p>
                                            </div>
                                        </li>
                             @else
                                  <li><h4 class="text-center" style="font-weight: bold;">سبد خرید شما خالی است</h4></li>
                             @endif
                        </ul>
                    </div>
                </div>
                @endauth
                <!-- Mini Cart End-->
                <!-- جستجو Start-->
                <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                    <div id="search" class="input-group">
                        <form action="{{ route('search') }}" method="post">
                            @csrf
                            <input id="filter_name" type="text" name="search" value="" placeholder="جستجو" class="form-control input-lg" />
                            <button type="submit" class="button-search"><i class="fa fa-search"></i></button>
                        </form>

                    </div>
                </div>
                <!-- جستجو End-->
            </div>
        </div>
    </header>
    <!-- Header End-->
    <!-- Main آقایانu Start-->

    <nav id="menu" class="navbar">

        <div class="container">
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                   <li> <a class="home_link" title="خانه" href="{{ route('index') }}">خانه</a> </li>
                    @foreach($frontCategories as $parentCategory)
                        <li data-id="{{ $parentCategory->id }}">
                        <a href="{{ route('products.category', [$parentCategory])}}">{{ $parentCategory->name }}</a>
                        @if($parentCategory->childs->count())
                        <div class="dropdown-menu" data-id="{{ $parentCategory->id }}">
                            <ul>
                                    @foreach($parentCategory->childs as $category)
                                            <li class="" data-id="{{ $category->id }}">
                                                <a href="{{ route('products.category', [$parentCategory ,$category] )}}">{{ $category->name }}  @if ($category->childs->count())<span>&rsaquo;</span>@endif</a>

                                                @if($category->childs->count())
                                                        <div class="dropdown-menu" data-id="{{ $category->id }}">
                                                            <ul>
                                                                @foreach($category->childs as $childCategory)
                                                                <li>
                                                                    <a href="{{ route('products.category', [$parentCategory ,$category , $childCategory->slug ] )}}"  data-id="{{ $childCategory->id }}">  {{ $childCategory->name }}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                @endif
                                            </li>
                                    @endforeach
                            </ul>
                            </div>
                        @endif
                        </li>
                    @endforeach
                    <li class="dropdown wrap_custom_block hidden-sm hidden-xs" style="cursor: pointer;">
                        <a>بلاک سفارشی</a>
                        <div class="dropdown-menu custom_block">
                            <ul>
                                <li>
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td><img alt="" src="/image/banner/cms-block.jpg"></td>
                                            <td><img alt="" src="/image/banner/responsive.jpg"></td>
                                            <td><img alt="" src="/image/banner/cms-block.jpg"></td>
                                        </tr>
                                        <tr>
                                            <td><h4>بلاک های محتوا</h4></td>
                                            <td><h4>قالب واکنش گرا</h4></td>
                                            <td><h4>پشتیبانی ویژه</h4></td>
                                        </tr>
                                        <tr>
                                            <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                            <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                            <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                        </tr>
                                        <tr>
                                            <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                                            <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                                            <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown information-link" style="cursor: pointer"><a>برگه ها</a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="{{ route('login') }}">ورود</a></li>
                                <li><a href="{{ route('register') }}">ثبت نام</a></li>
                                <li><a href="compare.html">مقایسه</a></li>
                                <li><a href="{{ route('showFavorites') }}">لیست آرزو</a></li>
                                <li><a href="search.html">جستجو</a></li>
                            </ul>
                            <ul>
                                <li><a href="{{ route('about') }}">درباره ما</a></li>
                                <li><a href="{{ route('notFound') }}">404</a></li>
                                <li><a href="{{ route('contact') }}">تماس با ما</a></li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="custom-link-right"><a href="#" target="_blank"> همین حالا بخرید!</a></li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main آقایانu End-->
</div>
