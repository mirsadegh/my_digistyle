<?php $__env->startSection('content'); ?>

  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="product-thumb1 card" style="width: 220px;hieght:530px">
                        <div class="image card-img-top">
                            <a href="<?php echo e(route('singleProduct',$product->id)); ?>">
                                <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" title="<?php echo e($product->name); ?>" class="img-responsive" style="width: 200px;height:330px" />
                            </a>
                        </div>

                    <div class="card-body">
                        <div class="caption">
                            <h4 class="card-title"><a href="<?php echo e(route('singleProduct',$product->id)); ?>"><?php echo e($product->name); ?></a></h4>
                            <p class="price">
                                <?php if($product->discount_percent): ?>
                                    <span class="price-new"><?php echo e($product->price - ($product->price * $product->discount_percent/100)); ?> تومان</span>
                                    <span class="price-old"><?php echo e($product->price); ?> تومان</span>
                                    <span class="saving">-<?php echo e($product->discount_percent); ?>%</span>
                                <?php else: ?>
                                    <span class="price-new"><?php echo e($product->price); ?> تومان</span>
                                <?php endif; ?>
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

                                <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick="">
                                    <i class="fa fa-exchange"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-vue'); ?>


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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('Frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/home/products.blade.php ENDPATH**/ ?>