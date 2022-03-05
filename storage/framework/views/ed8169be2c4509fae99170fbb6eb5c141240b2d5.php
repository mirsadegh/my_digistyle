<?php $__env->startSection('content'); ?>
    <h1>صفحه سفارشات</h1>
<table class="table">
    <tbody>
    <tr>
        <th>شماره سفارش</th>
        <th>تاریخ ثبت</th>
        <th>وضیعت سفارش</th>
        <th>کد رهگیری پستی</th>
        <th>اقدامات</th>
    </tr>

    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
           <td><?php echo e($order->id); ?></td>
            <td><?php echo e(jdate($order->created_at)->format('%d %B %Y')); ?></td>
             <td><?php echo e($order->status); ?></td>









            <td><?php echo e($order->tracking_serial ?? 'هنوز ثبت نشده'); ?></td>
            <td>
                <a href="<?php echo e(route('profile.orders.detail',$order->id )); ?>" class="btn btn-sm btn-info">جزییات سفارش</a>
                <?php if($order->status == 'unpaid'): ?>
                    <a href="<?php echo e(route('profile.orders.payment',$order->id)); ?>" class="btn btn-sm btn-warning">پرداخت سفارش</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>

 <?php echo e($orders->render()); ?>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('Frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/profile/orders-list.blade.php ENDPATH**/ ?>