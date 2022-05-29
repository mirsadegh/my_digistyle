<h3 class="subtitle">البسه - <a class="viewall" href="category.html">نمایش همه</a></h3>
<div class="owl-carousel latest_category_carousel">


    <?php $__currentLoopData = App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product-thumb">
            <div class="image">
                <a href="<?php echo e(route('singleProduct',$product->id)); ?>">
                    <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" title="<?php echo e($product->name); ?>"
                        class="img-responsive" width="205" />
                </a>
            </div>
            <div class="caption">
                <h4><a href="<?php echo e(route('singleProduct',$product->id)); ?>"><?php echo e($product->title); ?></a></h4>
                <?php if($product->discount_percent): ?>
                    <p class="price">
                        <span class="price-new"><?php echo e(number_format($product->price - ($product->price * $product->discount_percent) / 100)); ?> تومان</span>
                        <span class="price-old"><?php echo e(number_format($product->price)); ?> تومان</span>
                        <span class="saving">-<?php echo e($product->discount_percent); ?>%</span>
                    </p>
                <?php else: ?>
                    <p class="price"> <?php echo e(number_format($product->price)); ?> تومان </p>
                <?php endif; ?>
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

            </div>
            <div class="button-group">
                <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="post">
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
                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i
                            class="fa fa-exchange"></i></button>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/layouts/sliderStart2.blade.php ENDPATH**/ ?>