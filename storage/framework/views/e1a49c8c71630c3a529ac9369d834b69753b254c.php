<?php $__env->startComponent('admin.content' , ['title' => 'لیست پرداخت‌ها']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">سفارش شماره <?php echo e($order->id); ?> </li>
        <li class="breadcrumb-item active">لیست پرداخت‌ها</li>
    <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست پرداخت‌ها</h3>

                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="<?php echo e(request('search')); ?>">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>آیدی پرداخت</th>
                                <th>شماره پرداخت</th>
                                <th>وضعیت پرداخت</th>
                                <th>زمان ثبت پرداخت</th>
                            </tr>

                            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($payment->id); ?></td>
                                    <td><?php echo e($payment->resnumber); ?></td>
                                    <td><?php echo e($payment->status ? 'پرداخت شده' : 'پرداخت نشده'); ?></td>
                                    <td><?php echo e(jdate($payment->created_at)->format('%Y-%m-%d')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php echo e($payments->appends([ 'search' => request('search') ])->render()); ?>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

<?php if (isset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695)): ?>
<?php $component = $__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695; ?>
<?php unset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/admin/orders/payments.blade.php ENDPATH**/ ?>