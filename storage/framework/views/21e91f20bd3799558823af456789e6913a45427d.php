<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="/css/style-compare.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo e(route('compare')); ?>">مقایسه محصولات</a></li>
      </ul>
      <!-- Breadcrumb End-->

      <section class="cd-products-comparison-table">
		<header>
			<h2>مقایسه محصولات</h2>
		</header>


     
        <?php if(session()->get('compare')== null): ?>
             <h2 style="margin-right: 200px;">صفحه مقایسه شما خالی است!</h2>
        <?php else: ?>
            <div class="cd-products-table">
                <div class="features">
                    <div class="top-info">تصویر</div>
                    <ul class="cd-features-list">
                        <li>قیمت</li>
                        <li>امتیاز مشتریان</li>
                        <li>برند</li>
                        <li>توضیحات محصول</li>
                        <li>عملیات</li>
                    </ul>
                </div> <!-- .features -->

                <div class="cd-products-wrapper">

                    <ul class="cd-products-columns">

                <?php $__currentLoopData = Compare::findProduct(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php

                        $ratings = $product->ratings;
                        if ($ratings->count() > 0) {
                            $ratingCount = $ratings->count();
                        $stars_rated = 0 ;
                        foreach ($ratings as $rating){
                            $stars = $rating->stars_rated;
                            $stars_rated += $stars;
                        }
                        $avgRatingProduct = ($stars_rated/$ratingCount);
                        }

                    ?>

                        <li class="product">
                            <div class="top-info">

                                <img src="<?php echo e($product->image); ?>" alt="product image" width="120">
                                <h3><?php echo e($product->name); ?></h3>
                            </div> <!-- .top-info -->

                            <ul class="cd-features-list">
                                <li><?php echo e(number_format($product->price)); ?></li>
                        <li class="rating">
                                <?php if($ratings->count() > 0): ?>

                                <span><?php echo e(round($avgRatingProduct,2)); ?></span>
                                <span class="fa fa-stack">
                                    <i class="fa fa-star fa-stack-2x"></i>
                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                </span>
                            <?php endif; ?>
                            </li>
                                <li><?php echo e($product->brand->persian_name); ?></li>
                                <li><?php echo e((Illuminate\Support\Str::limit($product->description,100))); ?></li>
                                <li>
                                    <form action="<?php echo e(route('cart.add',$product->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-block btn-primary">افزودن به سبد</button>
                                    </form>

                                <form action="<?php echo e(route('deleteCompare',$product->id)); ?>" method="post" id="delete-<?php echo e($product->id); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                                    <a class="btn btn-danger btn-block mt-3" href="#" onclick="event.preventDefault();document.getElementById('delete-<?php echo e($product->id); ?>').submit()">حذف</a>
                                </li>
                            </ul>
                        </li> <!-- .product -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul> <!-- .cd-products-columns -->

                </div> <!-- .cd-products-wrapper -->

                
            </div> <!-- .cd-products-table -->

        <?php endif; ?>
	</section> <!-- .cd-products-comparison-table -->

<?php $__env->stopSection(); ?>





<?php echo $__env->make('Frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/home/compare.blade.php ENDPATH**/ ?>