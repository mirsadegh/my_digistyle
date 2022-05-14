<?php $__env->startSection('content'); ?>

  <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="#">حساب کاربری</a></li>
        <li><a href="wishlist.html">لیست علاقه مندی من</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">لیست آرزوی من</h1>



          <?php if($products->count() == 0): ?>
            <h3>محصولی در لیست علاقه‌مندی‌های شما موجود نمی باشد</h3>
           <?php else: ?>

          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-center">تصویر</td>
                  <td class="text-left">نام محصول</td>

                  <td class="text-right">موجودی</td>
                  <td class="text-right">قیمت واحد</td>
                  <td class="text-right">عملیات</td>
                </tr>
              </thead>
              <tbody>

              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td class="text-center">
                      <a href="<?php echo e(route('singleProduct',$product->id)); ?>">
                          <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" title="<?php echo e($product->name); ?>" width="50">
                     </a>
                   </td>
                  <td class="text-left"><a href="<?php echo e(route('singleProduct',$product->id)); ?>"><?php echo e($product->name); ?></a></td>

                  <td class="text-right"><?php echo e($product->inventory ? 'موجود' : 'ناموجود'); ?></td>
                  <td class="text-right"><div class="price"> <?php echo e(number_format($product->price)); ?> تومان </div></td>
                  <td class="text-right">

                    <form action="<?php echo e(route('cart.add',$product->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                         <button class="btn btn-primary" title="" data-toggle="tooltip"  type="submit" data-original-title="افزودن به سبد">
                           <i class="fa fa-shopping-cart"></i>
                         </button>
                    </form>

                    <a class="btn btn-danger" title="" data-toggle="tooltip" href="<?php echo e(route('unFavoriteWishlist',$product->id)); ?>" data-original-title="حذف">
                         <i class="fa fa-times"></i>
                    </a>
                </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


              </tbody>
            </table>
          </div>

          <?php endif; ?>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('Frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/profile/wishlist.blade.php ENDPATH**/ ?>