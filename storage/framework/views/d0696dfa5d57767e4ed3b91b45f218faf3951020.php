<?php $__env->startSection('content'); ?>
    <h1>جزییات سفارشات</h1>
<table class="table">
    <tbody>
    <tr class="text-center">
        <th>آیدی محصول</th>
        <th>عنوان محصول</th>
        <th>تعداد سفارش</th>
        <th>قیمت محصول</th>
    </tr>

    <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($product->id); ?></td>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->pivot->quantity); ?></td>
             <td><?php echo e(number_format($product->pivot->price)); ?> تومان</td> 
       </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
   <?php if($order->discountCode): ?>
      <hr>
       <div class="form-group" style="color: #676767">
       <div>
           <span> کد تخفیف استفاده شده :</span>
           <span class="text-success"><?php echo e($order->discountCode); ?></span>
       </div>
       <div>
           <span>  قیمت کد تخفیف استفاده شده :</span>
           <span class="text-success"><?php echo e(number_format($order->discountPrice)); ?> تومان</span>
       </div>
         <div>
                <span>  درصد کد تخفیف :</span> 
                <span class="text-success"><?php echo e($order->discountPersent); ?></span>
            </div>
   </div> 
   <?php endif; ?>
  
  <div class="form-group pull-left ">
      <span><b> قیمت کل سفارش ‌ :</b> </span>
      <span class="badge badge-lg badge-success"><?php echo e(number_format($order->price)); ?> تومان</span>
  </div>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('Frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/profile/order-detail.blade.php ENDPATH**/ ?>