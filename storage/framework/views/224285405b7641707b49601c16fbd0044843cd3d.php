<div id="product-tab" class="product-tab">
    <ul id="tabs" class="tabs">
        <li><a href="#tab-featured">ویژه</a></li>
        <li><a href="#tab-latest">جدیدترین</a></li>
        <li><a href="#tab-bestseller">پرفروش</a></li>
        <li><a href="#tab-special">پیشنهادی</a></li>
    </ul>
           <?php
               $amazing_sales = App\Models\AmazingSale::all();
           ?>
    <div id="tab-featured" class="tab_content">
        <div class="owl-carousel product_carousel_tab">

            <?php $__currentLoopData = $amazing_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amazing_sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-thumb clearfix">
                    <div class="image">
                        <a href="/products/<?php echo e($amazing_sale->product_id); ?>">
                            <img src="<?php echo e($amazing_sale->product->image); ?>"  title="<?php echo e($amazing_sale->product->name); ?>" class="img-responsive" />
                        </a>
                    </div>
                    <div class="caption">
                        <h4><a href="#"><?php echo e($amazing_sale->product->name); ?></a></h4>
                        <p class="price">
                            <span class="price-new">
                                <?php echo e(number_format($amazing_sale->product->price - ($amazing_sale->percentage/100 * $amazing_sale->product->price))); ?> تومان

                            </span>
                            <span class="price-old"><?php echo e(number_format($amazing_sale->product->price)); ?> تومان</span>
                            <span class="saving">-<?php echo e($amazing_sale->percentage); ?>%</span>
                        </p>

                        <?php
                           $sumRatingsProduct = App\Models\Rating::where('product_id',$amazing_sale->product->id)->sum('stars_rated');
                           $countRating = App\Models\Rating::where('product_id',$amazing_sale->product->id)->count();
                           $avgRatingProduct = $sumRatingsProduct/$countRating;
                           $avgRatingProduct = ceil($avgRatingProduct);

                        ?>
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
                    </div>
                    <div class="button-group">
                        <button class="btn-primary" type="button" onClick="cart.add('49');">
                            <span>افزودن به سبد</span>
                        </button>
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
                            <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick="">
                                <i class="fa fa-exchange"></i>
                            </button>
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

                            <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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


           <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/layouts/tabStart.blade.php ENDPATH**/ ?>