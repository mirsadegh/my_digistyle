
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
                <?php if(auth()->guard()->guest()): ?>
                    <div id="top-links" class="nav pull-right flip">
                        <ul>
                            <li><a href="<?php echo e(route('login')); ?>">ورود</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">ثبت نام</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div id="top-links" class="nav pull-right flip m-3">
                        <ul>
                            <li>
                               <div class="dropdown show">
                                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <span> <?php echo e(auth()->user()->name); ?></span>
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="<?php echo e(route('profile.index')); ?>">حساب کاربری</a>
                                    <a class="dropdown-item" href="<?php echo e(route('profile.orders')); ?>">سفارش های من</a>
                                    <a class="dropdown-item" href="<?php echo e(route('showFavorites')); ?>">لیست علاقمندی ها</a>
                                    <a class="dropdown-item"  href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()"> خروج از حساب کاربری</a>
                                    <form action="<?php echo e(route('logout')); ?>" method="post" id="logout-form">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                  </div>
                                </div>

                            </li>
                        </ul>
                    </div>
                <?php endif; ?>

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
                <?php if(auth()->guard()->check()): ?>
                <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div id="cart">
                        <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..." class="heading dropdown-toggle">
                            <span class="cart-icon pull-left flip"></span>
                            <?php
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
                            ?>
                            <?php if(Cart::all()->count()): ?>
                              <span id="cart-total"><?php echo e($totalQuantity); ?> آیتم - <?php echo e($total); ?> تومان</span>
                             <?php endif; ?>
                        </button>
                          <ul class="dropdown-menu">
                             <?php if(Cart::all()->count()): ?>
                                    <?php $__currentLoopData = Cart::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <?php
                                           $product = $cart['product'];
                                         ?>
                                        <li>
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">
                                                        <a href="<?php echo e(route('singleProduct',$product->id)); ?>">
                                                            <img class="img-thumbnail" title="<?php echo e($product->name); ?>" alt="<?php echo e($product->name); ?>" src="<?php echo e($product->image); ?>" width="50" height="100">
                                                        </a>
                                                    </td>
                                                    <td class="text-left"><a href="<?php echo e(route('singleProduct',$product->id)); ?>"><?php echo e($product->name); ?></a></td>
                                                    <td class="text-right">x <?php echo e($cart['quantity']); ?></td>
                                                    <td class="text-right"><?php echo e($product->price); ?> تومان</td>
                                                    <td class="text-center">
                                                        <form action="<?php echo e(route('cart.destroy',$cart['id'])); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button class="btn btn-danger btn-xs remove" title="حذف"  type="submit">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </li>

                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-right"><strong>جمع کل</strong></td>
                                                        <td class="text-right"><?php echo e($totalPrice); ?> تومان </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><strong> تخفیف </strong></td>
                                                        <td class="text-right"><?php echo e($discount); ?> تومان </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><strong>قابل پرداخت</strong></td>
                                                        <td class="text-right"><?php echo e($total); ?> تومان </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <p class="checkout">
                                                    <a href="<?php echo e(url('/cart')); ?>" class="btn btn-primary">
                                                        <i class="fa fa-shopping-cart"></i> مشاهده سبد
                                                    </a>&nbsp;&nbsp;
                                                </p>
                                            </div>
                                        </li>
                             <?php else: ?>
                                  <li><h4 class="text-center" style="font-weight: bold;">سبد خرید شما خالی است</h4></li>
                             <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
                <!-- Mini Cart End-->
                <!-- جستجو Start-->
                <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                    <div id="search" class="input-group">
                        <form action="<?php echo e(route('search')); ?>" method="post">
                            <?php echo csrf_field(); ?>
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
                   <li> <a class="home_link" title="خانه" href="<?php echo e(route('index')); ?>">خانه</a> </li>
                    <?php $__currentLoopData = $frontCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-id="<?php echo e($parentCategory->id); ?>">
                        <a href="<?php echo e(route('products.category', [$parentCategory])); ?>"><?php echo e($parentCategory->name); ?></a>
                        <?php if($parentCategory->childs->count()): ?>
                        <div class="dropdown-menu" data-id="<?php echo e($parentCategory->id); ?>">
                            <ul>
                                    <?php $__currentLoopData = $parentCategory->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="" data-id="<?php echo e($category->id); ?>">
                                                <a href="<?php echo e(route('products.category', [$parentCategory ,$category] )); ?>"><?php echo e($category->name); ?>  <?php if($category->childs->count()): ?><span>&rsaquo;</span><?php endif; ?></a>

                                                <?php if($category->childs->count()): ?>
                                                        <div class="dropdown-menu" data-id="<?php echo e($category->id); ?>">
                                                            <ul>
                                                                <?php $__currentLoopData = $category->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('products.category', [$parentCategory ,$category , $childCategory->slug ] )); ?>"  data-id="<?php echo e($childCategory->id); ?>">  <?php echo e($childCategory->name); ?></a>
                                                                </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>
                                                <?php endif; ?>
                                            </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            </div>
                        <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <li><a href="<?php echo e(route('login')); ?>">ورود</a></li>
                                <li><a href="<?php echo e(route('register')); ?>">ثبت نام</a></li>
                                <li><a href="<?php echo e(route('compare')); ?>">مقایسه</a></li>
                                <li><a href="<?php echo e(route('showFavorites')); ?>">لیست آرزو</a></li>
                                <li><a href="<?php echo e(route('searchPage')); ?>">جستجو</a></li>
                            </ul>
                            <ul>
                                <li><a href="<?php echo e(route('about')); ?>">درباره ما</a></li>
                                <li><a href="<?php echo e(route('notFound')); ?>">404</a></li>
                                <li><a href="<?php echo e(route('contact')); ?>">تماس با ما</a></li>
                            </ul>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main آقایانu End-->
</div>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/layouts/header.blade.php ENDPATH**/ ?>