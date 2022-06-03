<div id="product-tab" class="product-tab">
    <ul id="tabs" class="tabs">
        <li><a href="#tab-featured">ویژه</a></li>
        <li><a href="#tab-latest">جدیدترین</a></li>
        <li><a href="#tab-bestseller">پرفروش</a></li>
        
    </ul>
           <?php
               $amazing_sales = App\Models\AmazingSale::where('end_date','>=',Carbon\Carbon::now())->get();
           ?>
    <div id="tab-featured" class="tab_content">
        <div class="owl-carousel product_carousel_tab">

            <?php $__currentLoopData = $amazing_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amazing_sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-thumb clearfix">
                    <div class="image">
                        <a href="/products/<?php echo e($amazing_sale->product_id); ?>">
                            <img src="<?php echo e($amazing_sale->product->image); ?>"  title="<?php echo e($amazing_sale->product->name); ?>" class="img-responsive" width="180" />
                        </a>
                    </div>
                    <div class="caption">
                        <h4><a href="<?php echo e(route('singleProduct',$amazing_sale->product_id)); ?>"><?php echo e($amazing_sale->product->name); ?></a></h4>
                        <p class="price">
                            <span class="price-new">
                                <?php echo e(number_format($amazing_sale->product->price - ($amazing_sale->percentage/100 * $amazing_sale->product->price))); ?> تومان

                            </span>
                            <span class="price-old"><?php echo e(number_format($amazing_sale->product->price)); ?> تومان</span>
                            <span class="saving">-<?php echo e($amazing_sale->percentage); ?>%</span>
                        </p>

                        <?php
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

                        ?>
                        <?php if($ratings->count() > 0): ?>
                            <div class="rating">

                                <?php for($i=1;$i<=$avgRatingProduct;$i++): ?>
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star fa-stack-2x"></i>
                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                    </span>
                                <?php endfor; ?>
                                <?php for($i>$avgRatingProduct;$i<=5;$i++): ?>
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                    </span>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="button-group">
                        <form action="<?php echo e(route('cart.add',$amazing_sale->product->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary btn-lg">افزودن به سبد</button>
                        </form>
                        <div class="add-to-links">
                        <?php if(Auth::check()): ?>
                            <?php if(! $amazing_sale->product->favorited()): ?>
                                <a href="#" id="<?php echo e($amazing_sale->product_id); ?>" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick="event.preventDefault();changeFavorite(<?php echo e($amazing_sale->product_id); ?>)">
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            <?php else: ?>
                                <a href="#" id="<?php echo e($amazing_sale->product_id); ?>" data-toggle="tooltip" title="حذف از علاقه مندی ها" onClick="event.preventDefault();changeUnFavorite(<?php echo e($amazing_sale->product_id); ?>)">
                                    <i class="fa fa-heart"></i>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                          <form action="<?php echo e(route('addCompare',$amazing_sale->product->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                           <button type="submit" data-toggle="tooltip" title="مقایسه این محصول">
                                <i class="fa fa-exchange"></i>
                            </button>
                          </form>

                        </div>
                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>



    <div id="tab-latest" class="tab_content">
        <div class="owl-carousel product_carousel_tab">

            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-thumb">
                    <div class="image">
                        <a href="/products/<?php echo e($product->id); ?>">
                          <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" title="<?php echo e($product->name); ?>" class="img-responsive" width='205' height="205" />
                        </a>
                    </div>
                    <div class="caption">
                        <h4><a href="/products/<?php echo e($product->id); ?>"><?php echo e($product->name); ?></a></h4>
                         <?php if($product->discount_percent): ?>
                           <p class="price">
                                <span class="price-new"><?php echo e(number_format($product->price - ( $product->price * $product->discount_percent/100))); ?> تومان</span>
                                <span class="price-old"><?php echo e(number_format($product->price)); ?> تومان</span> <span class="saving">-<?php echo e($product->discount_percent); ?>%</span>
                             </p>
                         <?php else: ?>
                           <p class="price"> <?php echo e(number_format($product->price)); ?> تومان </p>
                         <?php endif; ?>
                    </div>

                    <?php
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
                    ?>
                   <?php if($ratings->count() > 0): ?>
                    <div class="rating">

                        <?php for($i=1;$i<=$avgRatingProduct;$i++): ?>
                            <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                        <?php endfor; ?>
                        <?php for($i>$avgRatingProduct;$i<=5;$i++): ?>
                            <span class="fa fa-stack">
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                        <?php endfor; ?>
                    </div>
                   <?php endif; ?>
                    <div class="button-group" id="app">
                        <form action="<?php echo e(route('cart.add',$product->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary btn-lg">افزودن به سبد</button>
                        </form>
                        <div class="add-to-links">

                            <?php if(Auth::check()): ?>
                                <?php if(! $product->favorited()): ?>
                                    <a href="#" id="<?php echo e($product->id); ?>" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick="event.preventDefault();changeFavorite(<?php echo e($product->id); ?>)">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="#" id="<?php echo e($product->id); ?>" data-toggle="tooltip" title="حذف از علاقه مندی ها" onClick="event.preventDefault();changeUnFavorite(<?php echo e($product->id); ?>)">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>

                            <form action="<?php echo e(route('addCompare',$product->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                               <button type="submit" data-toggle="tooltip" title="مقایسه این محصول">
                                    <i class="fa fa-exchange"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>

      <?php
           $bestsellerProducts = App\Models\Product::whereHas('orders', function($query){
                   $query->where('status','paid');
           })->get();
      ?>

    <div id="tab-bestseller" class="tab_content">
        <div class="owl-carousel product_carousel_tab">

         <?php $__currentLoopData = $bestsellerProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sellerProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="product-thumb">
                <div class="image">
                    <a href="/products/<?php echo e($sellerProduct->id); ?>">
                        <img src="<?php echo e($sellerProduct->image); ?>" alt="<?php echo e($sellerProduct->title); ?>" title="<?php echo e($sellerProduct->title); ?>" class="img-responsive" width="180" />
                    </a>
                </div>
                <div class="caption">
                    <h4><a href="/products/<?php echo e($sellerProduct->id); ?>"><?php echo e($sellerProduct->title); ?></a></h4>
                    <p class="price"> <?php echo e($sellerProduct->price); ?> تومان </p>
                </div>
                <?php
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
                ?>

                  <?php if($ratings->count() > 0): ?>
                    <div class="rating">
                        <?php for($i=1;$i<=$avgRatingProduct;$i++): ?>
                            <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                        <?php endfor; ?>
                        <?php for($i>$avgRatingProduct;$i<=5;$i++): ?>
                            <span class="fa fa-stack">
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>

                <div class="button-group">
                    <button class="btn-primary" type="button"><span>افزودن به سبد</span></button>
                    <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                    </div>
                </div>
            </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </div>
</div>


<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/layouts/tabStart.blade.php ENDPATH**/ ?>